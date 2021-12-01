<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisition = Requisition::with([
            'category',
            'product'=>function($q){
                $q->select('id','product_name');
            }
        ])->get();
        $category = Category::select('id','name')->get();
        return view('backend.requisition.index',compact('requisition','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['requisition_id'] = Str::random(6);
        $data['confirmed'] = false;
        $create = Requisition::create($data);
        return redirect()->back()->withmsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        $category = Category::select('id','name')->get();
        return view('backend.requisition.edit',compact('requisition','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $requisition->update($data);
        return redirect('admin/requisition')->withMsg('Successfully Updated');
    }
    public function confirm($id)
    {
        $update = Requisition::where('id',$id)->update(['confirmed'=> true]);
        return redirect()->back()->withmsg('Confirmed');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        $requisition->forceDelete();
        return redirect()->back()->withmsg('Successfully Deleted');
    }
}
