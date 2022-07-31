<?php

namespace App\Http\Controllers\OtherProcessing;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingUnit;
use Illuminate\Http\Request;

class VegetableProcessingController extends Controller
{
    public function vegetable_iqf(){
        $cut_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','cut_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_iqf')
        ->where('processing_variant','whole_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        return view('backend.production.vegetable_processing.iqf.index',compact('cut_n_clean_count','whole_count','whole_n_clean_count'));
    }
    public function vegetable_block(){
        $cut_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','cut_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        $whole_n_clean_count = ProductionProcessingUnit::select('id')->where('processing_name','vegetable_block')
        ->where('processing_variant','whole_n_clean')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        return view('backend.production.vegetable_processing.block.index',compact('cut_n_clean_count','whole_count','whole_n_clean_count'));
    }
}
