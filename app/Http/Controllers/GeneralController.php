<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BankAccount;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Filesystem\Filesystem;

class GeneralController extends Controller
{
    public function index()
    {
        $bank = BankAccount::all();
        $general = General::find(1);
        $admin = Auth::user()->email;
        return view('backend.general-setting.general', compact('general', 'admin','bank'));
    }

    public function update(Request $request, General $general, $id)
    {
     
        $general = General::find($id);
        $this->validate($request,array(
            'name' => 'required|max:191' ,
            'title' =>'required|max:191' ,
            'mobile' => 'required|max:191',
            'email' => 'required|max:191',
            'currency' => 'required|max:191',
            'image' => 'mimes:jpeg,bmp,png,jpg',
        ));
        $general->name = $request->input('name');
        $general->title = $request->input('title');
        $general->mobile = $request->input('mobile');
        $general->email = $request->input('email');
        $general->currency = $request->input('currency');

        $admin = Admin::whereId(1)->update(['email'=>$request->email]);
        //        image Upload
        if ($request->hasFile('image')) {
            $path = 'assets/images/logo/'.$general->image;
            if(file_exists(public_path($path))){
                unlink('assets/images/logo/'.$general->image);
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/logo/'. $filename;
            Image::make($image)->save($location);
            $general->image =  $filename;
        };

        $general->save();
        return redirect()->back()->withMsg('Successfully Updated');
    }

}
