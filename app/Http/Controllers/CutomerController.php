<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\Cutomer;
use Illuminate\Http\Request;

class CutomerController extends Controller
{
    public function cuctomerIndex()
    {
        $customer = Cutomer::all();
        $area=area::all();
        return view('backend.customer.customer', compact('customer','area'));
    }

    public function cuctomerStore(Request $request)
    {
            
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $data = $request->all();
        unset($data['_token']);
        $data['activated'] = true;
        Cutomer::create($data);
        return redirect()->back()->withmsg('Successfully Created');
    }

    public function cuctomerEdit($id)
    {
        $customer = Cutomer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function cuctomerUpdate(Request $request,$id)
    {
            
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        Cutomer::whereId($id)
            ->update([
               'full_name' => $request->full_name,
               'phone' => $request->phone,
               'email' => $request->email,
               'address' => $request->address,
               'include_word' => $request->include_word,
            ]);
        return redirect('admin/customer/management')->withmsg('Successfully Updated');
    }

    public function cuctomerDelete($id)
    {
            
        Cutomer::whereId($id)->delete();
        return redirect('admin/customer/management')->withmsg('Successfully Deleted');
    }

    // function action(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   $output = '';
    //   $query = $request->get('query');
    //   $data = null;
    //   if($query != null){
    //     $data = Product::with('pack')->where('category_id', 'like', '%'.$query.'%')
    //             ->orWhere('product_name', 'like', '%'.$query.'%')
    //             ->orWhere('product_id', 'like', '%'.$query.'%')
    //             ->orWhere('unit', 'like', '%'.$query.'%')
    //             ->orWhere('buying_price', 'like', '%'.$query.'%')
    //             ->orWhere('selling_price', 'like', '%'.$query.'%')
    //             ->orWhere('online_selling_price', 'like', '%'.$query.'%')
    //             ->orWhere('inhouse_selling_price', 'like', '%'.$query.'%')
    //             ->orWhere('retail_selling_price', 'like', '%'.$query.'%')
    //             ->orWhere('pack_id', 'like', '%'.$query.'%')
    //             ->orderBy('product_id', 'desc')
    //             ->get();
         
    //   }
    //   else
    //   {
    //     $data = Cutomer::with('pack')->orderBy('product_id', 'desc')->get();
    //   }
    //   $total_row = $data->count();
    //   if($total_row > 0)
    //   {
    //    foreach($data as $row)
    //    {
    //     $output .= 
    //     '<tr><td>'.
    //         $row->category_id
    //     .'</td><td>'.
    //     $row->product_name
    //     .'</td><td>'.
    //         $row->product_id
    //     .'</td><td>'.
    //         $row->category->name
    //     .'</td><td>'.
    //         $row->unit
    //     .'</td><td>'.
    //         $row->buying_price
    //     .'</td><td>'.
    //         $row->selling_price
    //     .'</td><td>'.
    //         $row->online_selling_price
    //     .'</td><td>'.
    //         $row->inhouse_selling_price
    //     .'</td><td>'.
    //         $row->retail_selling_price
    //     .'</td><td>'.
    //         $row->pack->name
    //     .'</td>
    //         <td>'.
    //             '<a class ="btn green" data-toggle="tooltip" data-placement="top" title="Add to Sale" href="/admin/product/sale/'.$row->id.'"><i class="fa fa-tag" aria-hidden="true"></i></a>
    //             <a class ="btn blue-chambray" data-toggle="tooltip" data-placement="top" title="Edit Product" href="/admin/product/edit/'.$row->id.'"><i class="fa fa-edit"></i></a>
    //             <button class="btn red test_id" data-id='.$row->id.'><i class="fa fa-trash"></i></button>'.
    //         '</td>'.
    //     '</tr>'
    //     ;
    //    }
    //   }
    //   else
    //   {
    //    $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //   }
    //   $data = array(
    //    'table_data'  => $output,
    //    'total_data'  => $total_row
    //   );

    //   echo json_encode($data);
    //  }
    // }
}
