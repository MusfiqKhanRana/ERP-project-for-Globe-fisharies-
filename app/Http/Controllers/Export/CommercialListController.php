<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\ExportDocument;
use App\Models\SalesContract;
use App\Models\SalesContractItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommercialListController extends Controller
{
    public function index(Request $request)
    {
        $commercial_status = null;
        if ($request->status == "Approved"){
            $commercial_status = 'Approved';
        }else{
            $commercial_status = 'Pending';
        }
        $pending_count = SalesContract::select('id','status')->where('status','Approved')->where('commercial_status','Pending')->count();
        $approved_count = SalesContract::select('id','commercial_status')->where('commercial_status','Approved')->count();
        $sale_contracts = SalesContract::where('status',"Approved")->where(function($q) use($commercial_status){
            if ($commercial_status) {
                $q->where('commercial_status',$commercial_status);
            }
        })
        ->with(['sales_contract_items'=>function($q){
            $q->with(['fish_grade']);
        },'export_buyer','advising_bank','documents'])->get();
       //dd($sale_contracts);
        return view('backend.export_management.commercial_list',compact('sale_contracts','pending_count','approved_count'));
    }

    public function commercial_list($id)
    {
        
        $sale_contract = SalesContract::where('id',$id)->update(['commercial_status'=>'Approved']);
        //dd($sale_contract);
        return redirect()->back()->withMsg('Successfully Approver');
    }
    public function store(Request $request, $id)
    {
        
        $invoice = SalesContract::find($id);
        $invoice->exp_no = $request->exp_no;
        $invoice->exp_date = $request->exp_date;
        //$invoice->date = $request->date;
        $invoice->cbm = $request->cbm;
        $invoice->production_date = $request->production_date;
        //$invoice->expiry_date = $request->expiry_date;
        $invoice->net_weight = $request->net_weight;
        $invoice->gross_weight = $request->gross_weight;
        $invoice->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    public function ExpiryDate(Request $request, $id)
    {
        
        $expiry_date = SalesContractItem::find($id);
        $expiry_date->expiry_date = $request->expiry_date;
        $expiry_date->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    public function AddDocument(Request $request){
        $document = new ExportDocument();
        $document->title = $request->title;
        //$document->document = $request->document;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            //dd($file);
            $filename = time().".".$request->document->extension();
            $file->move('assets/export/document/', $filename);
            $document->document = $filename;
        }
        
        $document->sales_contract_id = $request->sales_contract_id;
        $document->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    public function PrintCommercial($id){
        $data = SalesContract::with(['sales_contract_items'=>function($q){
            $q->with(['fish_grade']);
        },'export_buyer','advising_bank'])->where('id',$id)->first();
        return view('backend.export_management.commercial_list.print_commercial_list',compact('data'));
    }

    public function PrintCommercialCertificate($id){
        $data = SalesContract::with(['sales_contract_items'=>function($q){
            $q->with(['fish_grade']);
        },'export_buyer','advising_bank'])->where('id',$id)->first();
        //dd($sale_contracts);
        return view('backend.export_management.commercial_list.certificate_origin',compact('data'));
    }

    public function downloadFile($file){
        return response()->download('assets\export\document/'.$file);
      }

}
