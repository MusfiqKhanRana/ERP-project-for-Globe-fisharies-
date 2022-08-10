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
    public function index(Request $request)
    {
        $sale_contracts = SalesContract::with(['sales_contract_items','export_buyer','advising_bank'])->where('status',$request->status)->get();
        $pending_count = SalesContract::select('id','status')->where('status','Pending')->count();
        $approved_count = SalesContract::select('id','status')->where('status','Approved')->count();
        // dd($sale_contracts->toArray());
        return view('backend.export_management.sale_contract.sale_contract_list',compact('sale_contracts','approved_count','pending_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function approve_saleContract($id)
    {
        $sale_contract = SalesContract::where('id',$id)->update(['status'=>'Approved']);
        //dd($sale_contract);
        return redirect()->back()->withMsg('Successfully Approver');
    }

    public function Revise($id)
    {
        $sale_contract = SalesContract::where('id',$id)->update(['status'=>'Pending']);
        //dd($sale_contract);
        return redirect()->back()->withMsg('Successfully Approver');
    }

    public function create()
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $sales_contract=SalesContract::create([
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
        $count = 0;
        // dd($request->provided_item);
        foreach (json_decode($request->provided_item) as $input) {
            if ($input->status=="stay") {
                $count +=1; 
                SalesContractItem::create([
                    'sales_contract_id'=> $sales_contract->id,
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
        $sale_contracts = SalesContract::with(['sales_contract_items','export_buyer','advising_bank'])->first();
        return view('backend.export_management.sale_contract.edit_sale_contract',compact('sale_contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BuyerDetailsUpdate(Request $request, $id){
                
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

    public function ConsigneeUpdate(Request $request, $id){
                
        $consignee = ExportBuyer::find($id);
       
        $consignee->consignee_name = $request->input('consignee_name');
        $consignee->consignee_address = $request->input('consignee_address');
        $consignee->consignee_contact_number = $request->input('consignee_contact_number');
        $consignee->consignee_email = $request->input('consignee_email');
        $consignee->consignee_country = $request->input('consignee_country');
        $consignee->save();
        return redirect()->back()->withMsg('Employee Salary Updated');
    }

    public function NotifyUpdate(Request $request, $id){
                
        $notify = ExportBuyer::find($id);
       
        $notify->notify_party_name = $request->input('notify_party_name');
        $notify->notify_party_address = $request->input('notify_party_address');
        $notify->notify_party_contact = $request->input('notify_party_contact');
        $notify->notify_party_email = $request->input('notify_party_email');
        $notify->notify_party_country = $request->input('notify_party_country');
        $notify->save();
        return redirect()->back()->withMsg('Employee Salary Updated');
    }

    public function PaymentDetailsUpdate(Request $request, $id){
                
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

    public function ShipmentDetailsUpdate(Request $request, $id){
                
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
        SalesContract::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }

    public function itemDelete($id)
    {
        SalesContractItem::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }

    public function ex_buyer_datapass(Request $request){
        $export_buyer = ExportBuyer::where('id',$request->id)->first();
        return response()->json($export_buyer);
    }

    public function SaleContractPrint($id){
        // $sale_contracts = SalesContract::with(['sales_contract_items','export_buyer','advising_bank'])->where('id',$id)->get();
        //dd($sale_contracts);
        return view('backend.export_management.sale_contract.print_sale_contract');
    }
}
