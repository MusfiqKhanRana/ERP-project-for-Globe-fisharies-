<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\PartyProduct;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\SalePoint;
use App\Models\StockProduct;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalePointController extends Controller
{
    public function indexSale()
    {
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        return view('backend.generate_invoice.sale', compact('category','customer', 'warehouse'));
    }

    public function product_pass(Request $request)
    {
        $id = $request->id;
        $product = PartyProduct::with(
        ['supply_item',
        'product' => function($q){
            $q->with([
                'pack'=>function($q){
                        $q->select('id','name','weight');
                    },
                'supplyitem'
                ]);
            }
        ],
        )->where('party_id',$id)->get();
        // return $product;
        $output ="<option value=''>--Select--</option>";
        foreach($product as $value){
            // return $value->product->pack;
            if ($value->product->supplyitem->market_name == null) {
                $output.= '<option data-pack_weight="'.$value->product->pack->weight.'" data-product_price="'.$value->price.'" data-category_name="'.$value->product->processing_name.'" data-pack_name="'.$value->product->pack->name.'" value="'.$value->product_id.'">'.$value->product->supplyitem->name.'-'.$value->product->pack->name.'</option>';
            }
            if ($value->product->supplyitem->market_name != null) {
                $output.= '<option data-pack_weight="'.$value->product->pack->weight.'" data-product_price="'.$value->price.'" data-category_name="'.$value->product->processing_name.'" data-pack_name="'.$value->product->pack->name.'" value="'.$value->product_id.'">'.$value->product->supplyitem->market_name.'-'.$value->product->pack->name.'</option>';
            }
        }
        $data['output'] = $output;
        return response()->json($data);
    }

    public function productGet(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return response()->json($product);
    }

    public function saleProduct(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'warehouse_id' => 'required',
            'quantity' => 'required',
        ]);
        if ($request->phone || $request->email) {
            $customer = Cutomer::where('phone',$request->phone)
                        ->orWhere('email',$request->email)
                        ->first();
            if(!$customer){
                $customer = Cutomer::create(['full_name'=>$request->full_name,'phone' => $request->phone,'email'=>$request->email,'address'=>$request->address,'include_word'=>$request->include_word]);
                $request->customer_id = $customer->id;
            }
            else{
                $request->customer_id = $customer->id;
            }
        }
        $stock = StockProduct::where('warehouse_id', $request->warehouse_id)
            ->where('product_id',$request->product_id)->sum('quantity');

        if ($request->quantity < $stock)
        {
            $total = $request->quantity * $request->selling_price;
            if (!$request->discount_in_amount) {
               $a=$request->discount_in_percentage/100;
               $b=$request->selling_price * $a;
               $total = $total-$b;
            }
            else 
                $total = $total-$request->discount_in_amount;
          
            $cate = SalePoint::create([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'customer_id' => $request->customer_id,
                'quantity' => $request->quantity,
                'invoice_id' => $request->invoice_id,
                'discount_in_amount' => $request->discount_in_amount,
                'discount_in_percentage' => $request->discount_in_percentage,
                'total_amount' => $total,
                'date' => Carbon::today()
            ]);

            StockProduct::create([
                'warehouse_id' => $request->warehouse_id,
                'product_id' => $request->product_id,
                'quantity' => '-'.$request->quantity,
            ]);
            return view('backend.sold_invoice.invoice', compact('cate'));
        }

        return redirect()->back()->withdelmsg('Insufficient Stock');
    }

    public function soldProductHistory()
    {
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        $product = Product::all();
        $product = ProductOrder::orderBy('id', 'desc')->get();
        return view('backend.sold_product_history.history', compact('category','customer','product','warehouse'));
    }
    public function printHistory($invoice_id)
    {
        $cate = SalePoint::where('invoice_id', $invoice_id)->first();
        return view('backend.sold_invoice.invoice', compact('cate'));
    }
}
