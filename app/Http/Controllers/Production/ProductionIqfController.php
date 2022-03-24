<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingUnit;
use Illuminate\Http\Request;

class ProductionIqfController extends Controller
{
    public function index(){
        $fillet_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','fillet')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','whole')
        ->get()->count();
        $whole_gutted_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','whole_gutted')
        ->get()->count();
        $cleaned_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','cleaned')
        ->get()->count();
        $sliced_fmly_cut_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','sliced_fmly_cut')
        ->get()->count();
        $sliced_chinese_cut_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','sliced_chinese_cut')
        ->get()->count();
        $butter_fly_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','butter_fly')
        ->get()->count();
        $hgto_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','hgto')
        ->get()->count();
        return view('backend.production.processing.iqf.index',compact('fillet_count','whole_count','whole_gutted_count','cleaned_count','sliced_fmly_cut_count','sliced_chinese_cut_count','butter_fly_count','hgto_count'));
    }
    public function data_pass(Request $request){
        // return $request->type;
        $request->sub_type;
        if ($request->type=="iqf") {
            if ($request->sub_type=="fillet") {
                $fillet = ProductionProcessingUnit::with(
                    ['production_processing_item' => function($q){
                        $q->with([
                            'grade'=>function($q){
                                    $q->select('id','name');
                                }
                            ]);
                        }
                    ]
                    )
                ->select('invoice_code','item_id','alive_quantity','dead_quantity','requisition_code')
                ->where('processing_name','iqf')
                ->where('processing_variant','fillet')
                ->latest()
                ->get();
                return $fillet;
            }
        }
        // return $request;
    }
}
