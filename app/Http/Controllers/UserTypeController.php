<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\User;
use App\Models\UserType;
use App\Models\Pack;
use App\Models\Area;
use App\Models\Coldstorage;
use App\Models\FishGrade;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserType::orderBy('id', 'DESC')->latest()->paginate(10); 
        $tests = Party::orderBy('id', 'DESC')->latest()->paginate(10);
        $packs = Pack::orderBy('id', 'DESC')->latest()->paginate(10);
        $areas = Area::orderBy('id', 'DESC')->latest()->paginate(10);
        $coldstorages = ColdStorage::orderBy('id', 'DESC')->latest()->paginate(10);
        $grades = FishGrade::orderBy('id', 'DESC')->latest()->paginate(10);
       return view('backend.Menu.index', compact('users','packs','areas','tests','coldstorages','grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users_type.create');
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
           'name' => 'min:4|max:191',
        ));
        $users = new UserType;
        $users->name = $request->name;
        $users->save();

        return redirect()->route('user-type.index')->withMsg('Successfully Created');
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
        UserType::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserType::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
