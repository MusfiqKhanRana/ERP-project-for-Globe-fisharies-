<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\GeneralStockDisbursement;
use App\Models\GeneralStockDisbursementItem;
use App\Models\ProductionPurchaseItem;
use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionPurchaseType;
use App\Models\SupplyItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralItemStockController extends Controller
{
    public function GeneralStock(){
        $departments = Department::all();
        $types = ProductionPurchaseType::all();
        return view('backend.production.general_purchase.general_stock.index',compact('types','departments'));
    }
    public function data_pass(Request $request){
        $user = User::select('id','name','dept_id')->where('dept_id',$request->id)->get();
        return response()->json($user);
    }
    public function store(Request $request){
        // dd($request->toArray());
        $general_stock_disbursement=GeneralStockDisbursement::create([
            'disbursement_date'=>$request->disbursement_date,
            'department_id'=>$request->department,
            'requested_by'=>$request->requested_by,
            'remarks'=>$request->remarks,
        ]);
        foreach (json_decode($request->products) as $key => $input) {
            if ($input->status=="stay") {
                $ppri[]=GeneralStockDisbursementItem::create([
                    'general_stock_disbursement_id'=>$general_stock_disbursement->id,
                    'item_id'=>$input->item_id,
                    'item_name'=>$input->item_name,
                    'item_type_id'=>$input->item_type_id,
                    'item_type_name'=>$input->item_type_name,
                    'item_unit_id'=>$input->item_unit_id,
                    'item_unit_name'=>$input->item_unit_name,
                    'quantity'=>$input->quantity,
                    'closing_stock'=>$input->quantity
                ]);
            }
        }
        // dd($ppri);
        $arrLength = count($ppri);
        for ($i=0; $i <$arrLength; $i++) { 
            $last_item = GeneralStockDisbursementItem::where('item_id',$ppri[$i]->item_id)
                ->whereNotIn('id',[$ppri[$i]->id])
                ->orderBy('created_at', 'desc')
                ->latest()->first();
            GeneralStockDisbursementItem::where('id',$ppri[$i]->id)->update([
                'closing_stock'=>($ppri[$i]->quantity+$last_item->closing_stock), 
            ]);
        }
        return redirect()->back()->withMsg('Successfully Done');
    }
    public function disbursement_list(){
        $general_stock_disbursements=GeneralStockDisbursement::with('general_stock_disbursement_item')->get();
        // dd($general_stock_disbursements->toArray());
        return view('backend.production.general_purchase.general_stock.disbursement_list',compact('general_stock_disbursements'));
    }
    public function disbursement_return(Request $request){
        // dd($request->toArray());
        foreach ($request->item_id as $key => $value) {
            $qty = 0;
            $gsbi=GeneralStockDisbursementItem::where('id',$value)->first();
            $qty = ($gsbi->quantity)-($request->return_quantity [$key]);
            GeneralStockDisbursementItem::where('id',$value)
            ->update(
                ['quantity'=>$qty,'return_quantity'=>$request->return_quantity [$key],'return_quantity_date_time'=>Carbon::now()]
            );
        }
        return redirect()->back()->withMsg('Successfully Done');
    }
    public function disbursement_damage(Request $request){
        // dd($request->toArray());
        foreach ($request->item_id as $key => $value) {
            $qty = 0;
            $gsbi=GeneralStockDisbursementItem::where('id',$value)->first();
            $qty = ($gsbi->quantity)-($request->damage_quantity [$key]);
            GeneralStockDisbursementItem::where('id',$value)
            ->update(
                ['quantity'=>$qty,'damage_quantity'=>$request->damage_quantity [$key],'damage_quantity_date_time'=>Carbon::now()]
            );
        }
        return redirect()->back()->withMsg('Successfully Done');
    }
    public function disbursement_delete(Request $request){
        // dd($request->toArray());
        GeneralStockDisbursement::where('id',$request->id)->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }
    public function total_stock(){
        // dd($request->all());
        $search_date = null;
        // if ($request->date == null) {
            $search_date = Carbon::today();
            $items=ProductionPurchaseItem::with(['requisitions'=>function($q){
                $q->latest();
            },'disbursement_item'=>function($r){
                $r->latest();
            }])->get()->groupBy('name');
        // }
        // else{
        //     $items=ProductionPurchaseItem::with([
        //         'requisitions'=>function($q) use($request){
        //                 $q->where('status','InStock')
        //                 ->where('check_in_time',$request->date);
        //             },'disbursement_item'=>function($r) use($request){
        //                 $r->where('created_at',$request->date);
        //             }
        //         ])->get();
        // }
        dd($items->toArray());
        return view('backend.production.general_purchase.general_stock.total_stock',compact('items'));
    }
}
