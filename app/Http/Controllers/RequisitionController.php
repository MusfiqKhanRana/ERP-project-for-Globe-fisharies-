<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cutomer;
use App\Models\Party;
use App\Models\Requisition;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $category = Category::select('id','name')->get();
        $warehouse = Warehouse::select('id','name')->get();
        $party = Party::select('id','party_name')->get();
        $requisition = Requisition::with(['warehouse','party',
            'products'=>function($q){
                $q->with(['category','pack']);
            }
        ])->where('confirmed',false)->get();
        // return $requisition;
        return view('backend.requisition.index',compact('requisition','category','warehouse','party'));
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
        $requisition = Requisition::create(['warehouse_id'=>$data['warehouse_id'],'party_id'=>$data['party_id'],'requisition_id'=>$data['requisition_id'],'confirmed'=>$data['confirmed']]);
        foreach ($data['product_id'] as $key => $value) {
            $product_id = $value;
            $requisition_id = $requisition->id;
            $category_id = $data['category_id'][$key];
            $packet = $data['packet'][$key];
            $quantity = $data['quantity'][$key];
            DB::table('requisition_product')->insert(
                ['product_id' => $product_id , 'requisition_id' => $requisition_id,'category_id'=>$category_id,'packet'=>$packet,'quantity'=>$quantity]
            );
        }
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
        // $category = Category::select('id','name')->get();
        $warehouse = Warehouse::select('id','name')->get();
        $party = Party::select('id','party_name')->get();
        return view('backend.requisition.edit',compact('requisition','warehouse','party'));
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
