<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Car;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Owner::all();
        $cars=Car::all();
//
      return view("owners.index",['owners'=>$owners, 'cars'=>$cars]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'min:3', 'max:20'],
            'surname'=>['required', 'min:3', 'max:20'],
            'email' => ['email:rfc,dns', 'unique:App\Models\Owner,email']
        ],[
            'name.required'=>'Laukelis privalomas',
            'name.min'=>'Vardo laukelis ne trumpesnis nei 3 simboliai',
            'surname.required'=>'Laukelis privalomas',
            'surname.min'=>'Pavardės laukelis ne trumpesnis nei 3 simboliai',
            'email.email'=>'Elektroninio pašto adresas turi būti įvestas teisingai',
            'email.unique'=>'Toks elektroninio pašto adresas jau egzistuoja',
        ]);
        $owners=new Owner();
        $owners->name=$request->name;
        $owners->surname=$request->surname;
        $owners->email=$request->email;
        $owners->save();
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.update', ['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'=>['required', 'min:3', 'max:20'],
            'surname'=>['required', 'min:3', 'max:20'],
            'email' => ['email:rfc,dns', 'unique:App\Models\Owner,email']
        ],[
            'name.required'=>'Laukelis privalomas',
            'name.min'=>'Vardo laukelis ne trumpesnis nei 3 simboliai',
            'surname.required'=>'Laukelis privalomas',
            'surname.min'=>'Pavardės laukelis ne trumpesnis nei 3 simboliai',
            'email.email'=>'Elektroninio pašto adresas turi būti įvestas teisingai',
            'email.unique'=>'Toks elektroninio pašto adresas jau egzistuoja'
        ]);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->save();
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
