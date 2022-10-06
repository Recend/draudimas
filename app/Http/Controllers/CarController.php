<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use App\Models\User;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        $owners=Owner::all();
        $cars=Car::all();
        return view("cars.index",['cars'=>$cars, 'owners'=>$owners, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();
        return view('cars.create',['owners'=>$owners]);
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
            'reg_number'=>['required','min:6', 'max:6', 'alpha_num', 'unique:App\Models\Car,reg_number'],
            'brand'=>['required','min:3', 'max:30'],
            'model'=>['required','min:3', 'max:30']
        ],[
            'reg_number.required'=>'Automobilio registracijos numeris privalo būti pateiktas',
            'reg_number.unique'=>'Automobilis tokiu registracijos numeriu jau egzistuoja',
            'reg_number.min'=>'Automobilio registracijos numeris 6 simbolių be tarpo',
            'reg_number.max'=>'Automobilio registracijos numeris 6 simbolių be tarpo',
            'brand.required'=>'Automobilio markė privalo būti pateikta',
            'brand.min'=>'Automobilio markė ne trumpesnė nei 3 simboliai',
            'model.required'=>'Automobilio modelis privalo būti pateiktas',
            'model.min'=>'Automobilio modelis ne trumpesnis nei 3 simboliai'
            ]);
        $cars=new Car();
        $cars->reg_number=$request->reg_number;
        $cars->brand=$request->brand;
        $cars->model=$request->model;
        $cars->owner_id=$request->owner_id;
        $cars->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $owners=Owner::all();
        return view('cars.update', ['car'=>$car,'owners'=>$owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'reg_number'=>['required','min:6', 'max:6', 'alpha_num'],
            'brand'=>['required','min:3', 'max:30'],
            'model'=>['required','min:3', 'max:30']
        ],[
            'reg_number.required'=>'Automobilio registracijos numeris privalo būti pateiktas',
            'reg_number.min'=>'Automobilio registracijos numeris 6 simbolių be tarpo',
            'reg_number.max'=>'Automobilio registracijos numeris 6 simbolių be tarpo',
            'brand.required'=>'Automobilio markė privalo būti pateikta',
            'brand.min'=>'Automobilio markė ne trumpesnė nei 3 simboliai',
            'model.required'=>'Automobilio modelis privalo būti pateiktas',
            'model.min'=>'Automobilio modelis ne trumpesnis nei 3 simboliai'
        ]);
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
