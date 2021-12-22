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
    public function customerInfo(Request $request)
    {
        return response(Cutomer::find($request->id));
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

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      $data = null;
      if($query != null){
        $data = Cutomer::where('id', 'like', '%'.$query.'%')
                ->orWhere('full_name', 'like', '%'.$query.'%')
                ->orWhere('phone', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('address', 'like', '%'.$query.'%')
                ->orWhere('include_word', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();
         
      }
      else
      {
        $data = Cutomer::orderBy('id', 'desc')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= 
        '<tr><td>'.
            $row->id
        .'</td><td>'.
        $row->full_name
        .'</td><td>'.
            $row->phone
        .'</td><td>'.
            $row->email
        .'</td><td>'.
            $row->address
        .'</td><td>'.
            $row->include_word
        .'</td>
            <td>'.
                '<a class ="btn blue-chambray" data-toggle="tooltip" data-placement="top" title="Edit Product" href="/admin/customer/edit/'.$row->id.'"><i class="fa fa-edit"></i></a>
                <button class="btn red test_id" data-id='.$row->id.'><i class="fa fa-trash"></i></button>'.
            '</td>'.
        '</tr>'
        ;
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
