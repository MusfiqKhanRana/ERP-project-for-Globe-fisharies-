<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::where('date', '>=', date('2022-01-01'))->get();
        //dd($holidays);
        return view('backend.holiday.holiday', compact('holidays'));
     
    //      $holiday = Holiday::orderBy('start_date', 'ASC')->get();
    //      $months_array=[];
    //    foreach($holiday as $data) {
    //        $a = date("F-Y", strtotime($data->start_date));

    //        $that = date("Ym", strtotime($data->start_date));

    //        $currentMonth = date("Ym");

    //        if ($that >= $currentMonth){
    //            $months_array[] = $a;
    //             }
    //         }
    

    //     $months = array_unique($months_array);

    //     return view('backend.holiday.holiday', compact('months'));
    }


    // public function dateAjax(Request $request)
    // {
    //     $holiday = $request->name;
    //     $my = explode("-",$holiday);
    //     $mnm = $my[0];
    //     $yr = $my[1];
    //     $date = date_parse($mnm);
    //     $month = $date['month'];

    //     $start_month = DB::table('holidays')->whereMonth('start_date', $month)->get();
    //     $start_year = DB::table('holidays')->whereMonth('start_date', $yr)->get();

    //     $output = "";

    //     foreach($start_month as $value){
    //         $output .= ' <tr >
    //                         <td>'.$value->start_date.''.'/'.''.$value->end_date.'</td>
    //                         <td> '.$value->occasion.' </td>
                            
    //                     </tr>';
    //     }
    //     echo $output;
    // }

    public function store(Request $request)
        {
        
            $this->validate($request, array(
                'name' => 'required',
                'date' => 'required|max:191' ,
            ));

            $holi = new Holiday;
            $holi->name  = $request->name;
            $holi->date  = $request->date;
            $holi->description = $request->description;
            $holi->remark = $request->remark;
            $holi->save();
            return redirect('admin/holidays')->withMsg("Created Successfully");
        }



    public function update(Request $request, $id)
        {
            Holiday::whereId($id)
            ->update([
                'name' => $request->name,
                'date' => $request->date,
                'description' => $request->description,
                'remark' => $request->remark,
            ]);
            return redirect()->back()->withMsg("Successfully Updated");
        }


    public function destroy(Holiday $holiday, $id)
        {
            
            $holiday = Holiday::find($id);
            $holiday->delete();
            return redirect()->back()->withMsg('Successfully Deleted');
        }

    // public function userIndex()
    // {
    //     $holiday = Holiday::orderBy('start_date', 'ASC')->get();

    //     foreach($holiday as $data) {
    //         $a = Date("F-Y", strtotime($data->start_date));

    //         $that = Date("Ym", strtotime($data->start_date));

    //         $currentMonth = Date("Ym");

    //         if ($that>=$currentMonth){
    //             $months[] = $a;
    //         }
    //     }
    //     $months = array_unique($months);
    //     return view('users.holiday.holiday',compact('months'));
    // }
}
