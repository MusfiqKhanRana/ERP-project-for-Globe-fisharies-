<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\FishGrade;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionProcessingUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionIqfController extends Controller
{
    public function index(){
        $fillet_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','fillet')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $whole_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','whole')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $whole_gutted_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','whole_gutted')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $cleaned_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','cleaned')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $sliced_fmly_cut_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','sliced_fmly_cut')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $sliced_chinese_cut_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','sliced_chinese_cut')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $butter_fly_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','butter_fly')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $hgto_count = ProductionProcessingUnit::select('id')->where('processing_name','iqf')
        ->where('processing_variant','hgto')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $grades = FishGrade::all();
        $production_processing_grade = ProductionProcessingGrade::all();
        return view('backend.production.processing.iqf.index',compact('grades','production_processing_grade','fillet_count','whole_count','whole_gutted_count','cleaned_count','sliced_fmly_cut_count','sliced_chinese_cut_count','butter_fly_count','hgto_count'));
    }
    public function raw_iqf_shrimp_index(){
        $hlso = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','hlso')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $pud = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','pud')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $p_n_d_tail_on = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','p_n_d_tail_on')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $p_n_d_tail_off = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','p_n_d_tail_off')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $special_cut_p_n_d = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','special_cut_p_n_d')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $hlso_easy_pell = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','hlso_easy_pell')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $butterfly_pud_skewer = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','butterfly_pud_skewer')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $pud_pull_vein = ProductionProcessingUnit::select('id')->where('processing_name','raw_iqf_shrimp')
        ->where('processing_variant','pud_pull_vein')
        ->where('status','!=','StoreIn')
        ->get()->count();
        $grades = FishGrade::all();
        $production_processing_grade = ProductionProcessingGrade::all();
        return view('backend.production.processing.raw_iqf_shrimp.index',compact('grades','production_processing_grade','hlso','pud','p_n_d_tail_on','p_n_d_tail_off','special_cut_p_n_d','hlso_easy_pell','butterfly_pud_skewer','pud_pull_vein'));
    }
    public function soaking_data_pass(Request $request){
        $soaking_data = ProductionProcessingGrade::where('production_processing_unit_id',$request->id)->select('id','grade_name','grade_quantity')->get();
        return response()->json($soaking_data);
    }
    public function glazing_data_pass(Request $request){
        $glazing_data = ProductionProcessingGrade::where('production_processing_unit_id',$request->id)->select('id','grade_name','grade_quantity','soaking_weight','soaking_return')->get();
        return response()->json($glazing_data);
    } 
    public function randw_data_pass(Request $request){
        $randw_data = ProductionProcessingGrade::where('production_processing_unit_id',$request->id)->select('id','grade_name','grade_quantity','soaking_weight','soaking_return','glazing_weight')->get();
        return response()->json($randw_data);
    }   
    public function data_pass(Request $request){
                $data = ProductionProcessingUnit::with(
                    ['production_processing_item' => function($q){
                        $q->with([
                            'grade'=>function($q){
                                    $q->select('id','name');
                                }
                            ]);
                        }
                    ]
                    )
                ->select('id','invoice_code','item_id','status','alive_quantity','dead_quantity','requisition_code','processing_name','processing_variant')
                ->where(function ($q) use($request)
                {
                    if ($request->type) {
                        $q->where('processing_name',$request->type);
                    }
                })
                ->where('processing_variant',$request->sub_type)
                ->latest()
                ->get();
                return response()->json($data);
    }
    public function processing(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['Initial_weight'=>$request->initial_weight,'status'=>'Grading']
        );
        return redirect()->back()->withmsg('Successfully Send For Grading');
    }
    public function processing_to_clean(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['Initial_weight'=>$request->initial_weight,'status'=>'Clean']
        );
        return redirect()->back()->withmsg('Successfully Send For Cleaning');
    }
    public function cleaning_to_grading(Request $request){
        // dd($request);
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['cleaning_weight'=>$request->cleaning_weight,'status'=>'Grading']
        );
        return redirect()->back()->withmsg('Successfully Send For Grading');
    }
    public function grading(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->grade_ppu_id)
        ->update(
            ['Initial_weight'=>$request->initial_weight,'status'=>'Soaking']
        );
        foreach (json_decode($request->inputs) as $key => $input) {
            ProductionProcessingGrade::create([
                'grade_id' => $input->grade_id,
                'grade_name' => $input->grade_name,
                'grade_quantity' => $input->grade_weight,
                'production_processing_unit_id' => $request->grade_ppu_id,
                'grading_date'=>Carbon::now(),
            ]); 
        }    
        return redirect()->back()->withmsg('Successfully Send For Soaking');
    }
    public function grading_to_glazing(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->grade_ppu_id)
        ->update(
            ['Initial_weight'=>$request->initial_weight,'status'=>'Glazing']
        );
        foreach (json_decode($request->inputs) as $key => $input) {
            ProductionProcessingGrade::create([
                'grade_id' => $input->grade_id,
                'grade_name' => $input->grade_name,
                'grade_quantity' => $input->grade_weight,
                'production_processing_unit_id' => $request->grade_ppu_id,
                'grading_date'=>Carbon::now(),
            ]); 
        }    
        return redirect()->back()->withmsg('Successfully Send For Glazing');
    }
    public function soaking(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->soaking_ppu_id)
        ->update(
            ['status'=>'Glazing']
        );
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['soaking_weight'=>$request->soaking_weight [$key],'soaking_weight_datetime'=>Carbon::now(),'soaking_return'=>$request->return_weight [$key]]
            );
        }   
        return redirect()->back()->withmsg('Successfully Send For Glazing');
    }
    public function glazing(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->glazing_ppu_id)
        ->update(
            ['status'=>'RandW']
        );
        foreach ($request->item_id as $key => $value) {
            ProductionProcessingGrade::where('id',$value)
            ->update(
                ['glazing_weight'=>$request->glazing_weight [$key],'glazing_weight_datetime'=>Carbon::now()]
            );
        }   
        return redirect()->back()->withmsg('Successfully Send For Return and Wastage');
    }
    public function randw(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->randw_ppu_id)
        ->update(
            ['status'=>'StoreIn','wastage_quantity'=>$request->wastage_quantity,'return_quantity'=>$request->return_quantity,'RandW_datetime'=>Carbon::now()]
        );
        // foreach ($request->item_id as $key => $value) {
        //     ProductionProcessingGrade::where('id',$value)
        //     ->update(
        //         ['glazing_weight'=>$request->glazing_weight [$key],'glazing_weight_datetime'=>Carbon::now()]
        //     );
        // }   
        return redirect()->back()->withmsg('Successfully Your Process is Done');
    }
}