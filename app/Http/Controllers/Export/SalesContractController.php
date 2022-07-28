<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\ExportBuyer;
use App\Models\ExportPackSize;
use App\Models\FishGrade;
use App\Models\SalesContract;
use App\Models\SalesContractItem;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class SalesContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export_buyer = ExportBuyer::all();
        $items = SupplyItem::all();
        $grades = FishGrade::all();
        $export_pack_sizes = ExportPackSize::all();
        $bank_accounts = BankAccount::all();
        // dd($export_buyer->toArray());
        return view('backend.export_management.sale_contract.create_sale_contract',compact('export_buyer','items','grades','export_pack_sizes','bank_accounts'));
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
        // dd($request->toArray());
        SalesContract::create([
            'export_buyer_id'=>$request->export_buyer_id,
            'port_of_loading'=>$request->port_of_loading,
            'pre_carring_by'=>$request->pre_carring_by,
            'port_of_discharge'=>$request->port_of_discharge,
            'final_destination'=>$request->final_destination,
            'shipment_date'=>$request->shipment_date,
            'packaging_responsibility'=>$request->packaging_responsibility,
            'partial_shipment'=>$request->partial_shipment,
            'trans_shipment'=>$request->trans_shipment,
            'shipping_responsibility'=>$request->shipping_responsibility,
            'cfr_rate'=>$request->cfr_rate,
            'cif_rate'=>$request->cif_rate,
            'shipment_remark'=>$request->shipment_remark,
            'payment_method'=>$request->payment_method,
            'grand_total'=>$request->grand_total,
            'paid_in_percentage'=>$request->paid_in_percentage,
            'paid_in_amount'=>$request->paid_in_amount,
            'due_amount'=>$request->due_amount,
            'advising_bank_id'=>$request->advising_bank_id,
            'advising_bank_account_no'=>$request->advising_bank_account_no,
            'advising_bank_swift_code'=>$request->advising_bank_swift_code,
            'bank_charge'=>$request->bank_charge,
            'offer_validity'=>$request->offer_validity,
            'bank_name'=>$request->imporeter_bank_name,
            'importer_account_name'=>$request->importer_account_name,
            'importer_account_no'=>$request->importer_account_no,
            'export_buyer_id'=>$request->export_buyer_id,
            'importer_bank_branch'=>$request->importer_bank_branch,
            'importer_bank_country'=>$request->importer_bank_country,
            'remark'=>$request->remark,
            'status'=>'Pending'
        ]);
        foreach (json_decode($request->provided_item) as $key => $input) {
            if ($input->status=="stay") {
                SalesContractItem::create([
                    'consignment_type' => $input->consignment_type,
                    'hs_code' => $input->hs_code,
                    'processing_type' => $input->type,
                    'processing_variant' => $input->variant,
                    'supply_item_id'=>$input->item_name,
                    'fish_grade_id'=>$input->grade,
                    'export_pack_size_id'=>$input->pack_size,
                    'block_size'=>"add this",
                    'block_name'=>"add this",
                    'cartons'=>$input->cartons,
                    'total_in_kg'=>$input->total_in_kg,
                    'rate'=>$input->rate,
                    'total_amount'=>$input->total_amount,
                    'freight_rate'=>$input->freight_rate,
                    'total_cfr_rate'=>$input->total_cfr_rate,
                    'total_cif_rate'=>$input->total_cif_rate,
                    'total_amount_cfr'=>$input->total_amount_cfr,
                    'total_amount_cif'=>$input->total_amount_cif,
                ]); 
            }
        }    
        return redirect()->back()->withmsg('Successfully Saved');
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
        //
    }

    public function ex_buyer_datapass(Request $request){
        $export_buyer = ExportBuyer::where('id',$request->id)->first();
        return response()->json($export_buyer);
    }
}
