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
}
