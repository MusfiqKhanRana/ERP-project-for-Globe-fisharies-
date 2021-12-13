<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Warehouse;
use Illuminate\Http\Request;

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
        return view('backend.Order.create_order', compact('category','customer', 'warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        $product = Product::all();
        return view('backend.Order.create_order', compact('category','customer','product','warehouse'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $this->validate($request, array(
            'customer_id' => 'required',
            'warehouse_id' => 'required',
            'product_id' => 'required',
            'service_quantity' => 'required',
            'service_amount' => 'required',
            'discount_in_percentage' => 'required',
            'discount_in_amount' => 'required',
        ));

        $data = $request->all();
        // dd(var_dump($data));
        $order = Order::create(['customer_id' => $data['customer_id']]);
        foreach ($data['warehouse_id'] as $key => $value) {
            $product_order = ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $data['product_id'][$key],
                'warehouse_id' => $data['warehouse_id'][$key],
                'quantity' => $data['service_quantity'][$key],
                'discount_in_amount' => $data['discount_in_amount'][$key],
                'discount_in_percentage' => $data['discount_in_percentage'][$key],
                'selling_price' => $data['service_amount'][$key],
            ]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $productOrder)
    {
        //
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
}
