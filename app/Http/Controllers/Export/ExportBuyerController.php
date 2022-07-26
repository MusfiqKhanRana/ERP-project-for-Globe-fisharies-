<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\ExportBuyer;
use Illuminate\Http\Request;

class ExportBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export_details = ExportBuyer::get();
        // dd($export_details->toArray());
        return view('backend.export_management.manage_buyer.index',compact('export_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.export_management.manage_buyer.create_buyer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->provided_item = json_decode($request->provided_item);
        $request->hs_item = json_decode($request->hs_item);
        //dd($request->hs_item);
        $inputs = $request->except('_token');
        $export = new ExportBuyer;
        $export->buyer_code = $request->buyer_code;
        $export->buyer_name = $request->buyer_name;
        $export->buyer_address = $request->buyer_address;
        $export->buyer_contact_number = $request->buyer_contact_number;
        $export->buyer_email = $request->buyer_email;
        $export->buyer_country = $request->buyer_country;
        $export->consignee_name = $request->consignee_name;
        $export->consignee_address = $request->consignee_address;
        $export->consignee_contact_number = $request->consignee_contact_number;
        $export->consignee_email = $request->consignee_email;
        $export->consignee_country = $request->consignee_country;
        $export->notify_party_name = $request->notify_party_name;
        $export->notify_party_address = $request->notify_party_address;
        $export->notify_party_contact = $request->notify_party_contact;
        $export->notify_party_email = $request->notify_party_email;
        $export->notify_party_country = $request->notify_party_country;
        $export['bank_details'] = serialize($request->provided_item);
        $export['assign_hs_code'] = serialize($request->hs_item);
        $export->save();

        return redirect()->route('export-buyer.index')->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExportBuyer::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
