<?php

namespace App\Http\Controllers;

use App\Models\ProductionUserPerformance;
use App\Models\SupplyItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionUserPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $items = SupplyItem::get();
        $performances = ProductionUserPerformance::get();
        // dd("good");
        return view('backend.production.production-data.production_user_performance.index',compact('users','items','performances'));
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
        $inputs = $request->except('_token');
        $this->validate($request,array(
            'user_id' => 'required',
            'item_id' => 'required',
            'remark' => 'max:256',
        ));
        $request->provided_item = json_decode($request->provided_item);
        //$request->date=Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        // dd($request->all());
        $performance = new ProductionUserPerformance();
        $performance->date = $request->date;
        $performance->user_id = $request->user_id;
        $performance->item_id = $request->item_id;
        $performance->performance_info = serialize($request->provided_item);
        $performance->submited_by = Auth::User()->id;
        $performance->remark = $request->remark;
        $performance->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionUserPerformance::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function AllUser()
    {
        $items = User::get();
        return $items;
    }
    public function getUser($id)
    {
        $items = User::find($id);
        return $items;
    }
}
