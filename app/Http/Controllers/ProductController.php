<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Product;
use App\Models\StockProduct;
use App\Models\Warehouse;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productIndex()
    {
        $product = Product::all();
        $category = Category::all();
        return view('backend.product.product', compact('product', 'category'));
    }

    public function productStore(Request $request)
    {
             
        $this->validate($request,[
            'product_id' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'unit' => 'required',
            'buying_price' => 'required',
            'online_selling_price'=>'required',
            'inhouse_selling_price'=>'required',
            'retail_selling_price'=>'required',
        ]);

        Product::create($request->all());

        return redirect()->back()->withMsg("Product Added");
    }

    public function productEdit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('backend.product.product_edit', compact('product', 'category'));
    }
    public function productSale($id)
    {
        $product = Product::with('category','stock')->find($id);
        $category = Category::all();
        $customer = Cutomer::all();
        $warehouse = Warehouse::all();
        return view('backend.product.product_sale', compact('product','category','customer', 'warehouse'));
    }

    public function productDelete($id)
    {
             
        $product = Product::whereId($id)->delete();
        return redirect()->back()->withMsg("Product Deleted");
    }

    public function productUpdate(Request $request,$id)
    {
             
        $this->validate($request,[
            'product_id' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'unit' => 'required',
            'buying_price' => 'required',
            'online_selling_price'=>'required',
            'inhouse_selling_price'=>'required',
            'retail_selling_price'=>'required',
        ]);

        Product::whereId($id)
            ->update([
               'product_id' => $request->product_id,
               'product_name' => $request->product_name,
               'category_id' => $request->category_id,
               'unit' => $request->unit,
               'buying_price' => $request->buying_price,
               'online_selling_price' => $request->online_selling_price,
               'inhouse_selling_price' => $request->inhouse_selling_price,
               'retail_selling_price' => $request->retail_selling_price,
            ]);
        return redirect('admin/products')->withmsg('Successfully Updated');

    }

    public function productStock()
    {
        $product = Product::all();
        $warehouse = Warehouse::all();
        $stock_product = StockProduct::orderBy('id','desc')->get(['warehouse_id']);
        return view('backend.product.stock', compact('product', 'warehouse', 'stock_product'));
    }

    public function storeWarehouse(Request $request)
    {
       Warehouse::create($request->all());
        return redirect()->back()->withMsg('Warehouse Successfully Created');
    }

    public function deleteWarehouse($id)
    {
       Warehouse::whereId($id)->delete();
        return redirect()->back()->withMsg('Warehouse Successfully Deleted');
    }

    public function updateWarehouse(Request $request,$id)
    {
       Warehouse::whereId($id)->update([
           'name' => $request->name,
           'location' => $request->location
       ]);
        return redirect()->back()->withMsg('Warehouse Successfully Updated');
    }

    public function stockStoreProduct(Request $request)
    {
        StockProduct::create($request->all());
        return redirect()->back()->withMsg('Product Added Successfully');
    }

    public function stockProductDetail($id)
    {
        $stock_product = StockProduct::where('warehouse_id', $id)
            ->distinct()->get(['product_id']);
        return view('backend.product.warehouse_stock_product', compact('stock_product','id'));
    }
}
