<?php

namespace App\Http\Controllers;

use App\Models\FishGrade;
use Illuminate\Http\Request;

class FishGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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
        
        $inputs = $request->except('_token');
        $this->validate($request,array(
           'name' => 'required|max:191',
        ));
        $grades = new FishGrade();
        $grades->name = $request->name;
        $grades->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FishGrade  $fishGrade
     * @return \Illuminate\Http\Response
     */
    public function show(FishGrade $fishGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FishGrade  $fishGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(FishGrade $fishGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FishGrade  $fishGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FishGrade::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FishGrade  $fishGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FishGrade::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
