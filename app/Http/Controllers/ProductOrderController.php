<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Warehouse;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        $areas  = Area::all();
        return view('backend.Order.create_order', compact('category','customer', 'warehouse','areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = Category::with(['product'=>function($q){
        //     $q->with('pack')->select('id','category_id','supply_item_id','pack_id','online_selling_price','inhouse_selling_price');
        // }])->get();
        //dd($category);
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        $products = Product::all();
        //dd($product);
        $areas = Area::all();
        // return $category;
        return view('backend.Order.create_order', compact('customer','products','warehouse','areas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $this->validate($request, array(
        //     'customer_id' => 'required',
        //     'category_id' => 'required',
        //     'product_id' => 'required',
        //     'service_quantity' => 'required',
        //     'service_amount' => 'required',
        //     'discount_in_percentage' => 'required',
        //     'discount_in_amount' => 'required',
        // ));

        $data = $request->all();
        // dd($data);
        // dd(var_dump($data));
        $order = Order::create(['customer_id' => $data['customer_id'],'remark' => $data['remark'],'total_discount' => $data['total_discount'],'delivery_charge'=>$data['delivery_charge'],'payment_method'=>$request->payment_method,'trx_number'=>"", 'trx_id'=>"",
        'invoice_code' => random_int(100000, 999999),'paid_amount'=>$request->paid_amount]);
        foreach (json_decode($request->products) as $key => $product) {
            // dd(var_dump($product->amount_discount));
            if ($product->status=="stay"){
                $product_order = ProductOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product->product_id,
                    'category_type' => $product->category_type,
                    'quantity' => $product->quantity_packet,
                    'discount_in_amount' => floatval($product->amount_discount),
                    'discount_in_percentage' => floatval($product->percentage_discount),
                    'rate' => floatval($product->rate),
                ]);
            }
            
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOrder $productOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOrder $productOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOrder $productOrder)
    {
        //
    }
    public function OrderProductUpdate(Request $request, $id)
    {
        // dd($request);
        ProductOrder::whereId($id)
        ->update([
            'quantity' => $request->quantity,
            'discount_in_amount' => $request->discount_in_amount,
            'discount_in_percentage' =>$request->discount_in_percentage,
        ]);
        return redirect()->route('order-history.index',"status=Pending")->withMsg("Successfully Ordered Product Updated");
        //return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductOrder::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function order_delete($id)
    {
        Order::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function warehouse_product_pass(Request $request)
    {
        $id = $request->id;
        $warehouse = Warehouse::with('products')->find($id);
        $process_product = $this->processWarehouseProduct($warehouse);
        // $output ="";
        // foreach($process_product as $value){
        //     // $output.= '<option value="'.$value['id'].'">'.$value['product_name'].'('.$value['stock_quantity'].')</option>';
        //     $output.= '<option>value</option>'; 
        // }
        // $data['output'] = $output;
        return response($process_product);

    }
    public function processWarehouseProduct($warehouse)
    {
        $process_array = [];
        $unique_ids = [];
        $total_quantity = 0;
        foreach ($warehouse->products as $key => $product) {
            if (!in_array($product->pivot->product_id,$unique_ids)){
                array_push($unique_ids,$product->pivot->product_id);
                array_push($process_array,['id'=> $product->id,'product_name' => $product->product_name,'stock_quantity' => $product->pivot->quantity]);
            }
        }
        return $process_array;
    }
    public function warehouse_productGet(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return response()->json($product);
    }
    public function product_price(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return response()->json($product);
    }
    public function dataAjax(Request $request)
    {
    	$data = [];
        $search = $request->q;
        $data =Cutomer::with('area')->select("id","full_name","customer_type",'area_id','phone')
                ->where('full_name','LIKE',"%$search%")
                ->orWhere('customer_type','LIKE',"%$search%")
                ->get();
        return response()->json($data);
    }
    public function singleProductOrderStore(Request $request){
        // dd($request);
        $product_order = ProductOrder::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'discount_in_amount' => floatval($request->discount_in_amount),
            'discount_in_percentage' => floatval($request->discount_in_percentage),
            'rate' => floatval($request->rate),
        ]);
        return redirect()->back()->withMsg("Successfully added Product to The List");
    }
}
