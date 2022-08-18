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
        $exportBuyer = ExportBuyer::first();
        return view('backend.export_management.manage_buyer.edit_buyer',compact('exportBuyer'));
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
        
    }

    public function BuyerInfoUpdate(Request $request, $id){
                
        $buyer = ExportBuyer::find($id);
       
        $buyer->buyer_code = $request->input('buyer_code');
        $buyer->buyer_name = $request->input('buyer_name');
        $buyer->buyer_address = $request->input('buyer_address');
        $buyer->buyer_contact_number = $request->input('buyer_contact_number');
        $buyer->buyer_email = $request->input('buyer_email');
        $buyer->buyer_country = $request->input('buyer_country');
        $buyer->save();
        return redirect()->back()->withMsg('Employee Salary Updated');
    }

    public function ConsigneeInfoUpdate(Request $request, $id){
                
        $consignee = ExportBuyer::find($id);
       
        $consignee->consignee_name = $request->input('consignee_name');
        $consignee->consignee_address = $request->input('consignee_address');
        $consignee->consignee_contact_number = $request->input('consignee_contact_number');
        $consignee->consignee_email = $request->input('consignee_email');
        $consignee->consignee_country = $request->input('consignee_country');
        $consignee->save();
        return redirect()->back()->withMsg('Employee Salary Updated');
    }

    public function NotifyInfoUpdate(Request $request, $id){
                
        $notify = ExportBuyer::find($id);
       
        $notify->notify_party_name = $request->input('notify_party_name');
        $notify->notify_party_address = $request->input('notify_party_address');
        $notify->notify_party_contact = $request->input('notify_party_contact');
        $notify->notify_party_email = $request->input('notify_party_email');
        $notify->notify_party_country = $request->input('notify_party_country');
        $notify->save();
        return redirect()->back()->withMsg('Employee Salary Updated');
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
