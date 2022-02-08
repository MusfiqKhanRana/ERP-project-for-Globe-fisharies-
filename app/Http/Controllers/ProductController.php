<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Pack;
use App\Models\Product;
use App\Models\StockProduct;
use App\Models\Warehouse;
use Faker\Provider\ar_SA\Color;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function productIndex()
    {
        // $product = Product::with('stock')->get();
        $category = Category::all();
        $pack = Pack::all();
        return view('backend.product.product', compact('pack','category'));
    }

    public function productStore(Request $request)
    {
             
        $this->validate($request,[
            'category_id' => 'required',
            'product_name' => 'required',
            'buying_price' => 'required',
            'online_selling_price'=>'required',
            'inhouse_selling_price'=>'required', 
        ]);
        $data = $request->except('_token');
        $data['product_id'] = random_int(100000, 999999);
        //dd ($product_id);
        if ($request->hasFile('image')) {
            // dd("get this");
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $data['image'] =  $filename;
            $location = 'assets/images/product/images/'. $filename;
            Image::make($image)->save($location);
        }
        // dd($data);
        Product::create($data);

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
        // return redirect()->back()->withMsg("Product Deleted");
        return response("Data Deleted");
    }

    public function productUpdate(Request $request,$id)
    {
             
        $this->validate($request,[
            'product_id' => 'required',
            'category_id' => 'required',
            'product_name' => 'required',
            'buying_price' => 'required',
            'online_selling_price'=>'required',
            'inhouse_selling_price'=>'required',
        ]);
        $product=  Product::find($id);
            
            if ($request->hasFile('image')) {
                if ($product->image!=null) {
                    unlink('assets/images/product/images/'.$product->image);
                }
                $image = $request->file('image');
                $filename = time() . '.' . 'jpg';
                $location = 'assets/images/product/images/'. $filename;
                Image::make($image)->save($location);
                $product->image =  $filename;
            }
            $product->update([
               'product_id' => $request->product_id,
               'product_name' => $request->product_name,
               'category_id' => $request->category_id,
               'buying_price' => $request->buying_price,
               'online_selling_price' => $request->online_selling_price,
               'inhouse_selling_price' => $request->inhouse_selling_price,
               'pack_id' => $request->pack_id,
               'safety_stock' => $request->safety_stock,
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
        $warehouse = Warehouse::find($id);
        $stock_product = StockProduct::where('warehouse_id', $id)
            ->distinct()->get(['product_id']);
        return view('backend.product.warehouse_stock_product', compact('stock_product','id','warehouse'));
    }
    public function packsize()
    {
        $data = Pack::all();
        return response()->json(['data' => $data]);
    }
    function action(Request $request)
    {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            $data = null;
            if($query != null){
                $data = Product::with(['pack','stock'])->where('category_id', 'like', '%'.$query.'%')
                        ->orWhere('product_name', 'like', '%'.$query.'%')
                        ->orWhere('product_id', 'like', '%'.$query.'%')
                        ->orWhere('buying_price', 'like', '%'.$query.'%')
                        ->orWhere('selling_price', 'like', '%'.$query.'%')
                        ->orWhere('online_selling_price', 'like', '%'.$query.'%')
                        ->orWhere('inhouse_selling_price', 'like', '%'.$query.'%')
                        ->orWhere('pack_id', 'like', '%'.$query.'%')
                        ->orderBy('product_id', 'desc')
                        ->latest()
                        ->get();
                
            }
            else
            {
                $data = Product::with(['pack','stock'])->orderBy('product_id', 'desc')->latest()->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {       
                    $total_quantity = 0;
                    $color = null;
                    $txtColor = null;
                    if (!empty($row->stock->toArray())) {
                        foreach ($row->stock as $key => $value) {
                            $total_quantity+=$value->quantity;
                        }
                    }
                    if($total_quantity <= $row->safety_stock){
                        $color = "#ff4d4d";
                        $txtColor="white";

                    }
                    $output .= 
                        '<tr style="color:'.$txtColor.'; background:'.$color.'"><td>'.
                            // $row->image
                            // asset('assets/images/product/images/').$row->image
                            '<img style="weidth: 60px; height: 60px; border-radius: 15px;" src="'.asset('assets/images/product/images').'/'.$row->image.'"></img>'
                        .'</td><td>'.
                        $row->product_name
                        .'</td><td>'.
                            $row->product_id
                        .'</td><td>'.
                            $row->category->name
                        .'</td><td>'.
                            $row->buying_price
                        .'</td><td>'.
                            $row->online_selling_price
                        .'</td><td>'.
                            $row->inhouse_selling_price
                        .'</td><td>'.
                            $row->pack->name
                        .'</td><td>'.
                            $row->safety_stock    
                        .'</td><td>'.
                            $total_quantity
                        .'</td>
                            <td style="text-align: center;">'.
                                '<a class ="btn green" data-toggle="tooltip" data-placement="top" title="Add to order List" href="/admin/product/sale/'.$row->id.'"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                <a class ="btn blue-chambray" data-toggle="tooltip" data-placement="top" title="Edit Product" href="/admin/product/edit/'.$row->id.'"><i class="fa fa-edit"></i></a>
                                <button class="btn red test_id" data-id='.$row->id.'><i class="fa fa-trash"></i></button>'.
                            '</td>'.
                        '</tr>';
                }
            }
            else
            {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
