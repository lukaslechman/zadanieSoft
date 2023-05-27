<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Models\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return $cars;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function test(Request $request){
        Log::debug('message',array($request->car));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {    
        
        $validated = $request->validated();
 
        $newcar = Car::create([
            'name' => $request->car["name"],
            'is_registered' => $request->car['is_registered'] ,
            'registration_number' => $request->car['is_registered'] == true ? $request->car["registration_number"]:null
        ]);
        
         
        return $newcar;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $car = Car::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarStoreRequest $request, string $id)
    {
        
        try{
            $car = Car::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return response("Car doesnt exist.", 404);
        }


        $validated = $request->validated();
        $car->name = $request->car['name'];
        $car->is_registered = $request->car['is_registered'] ;
        $car->registration_number = $request->car['is_registered'] == 1  ? $request->car["registration_number"]:null;
       
        $car->save();

        return $car;
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $car = Car::findOrFail($id);
            $car->delete();
            return response("Car deleted.", 204);
        } catch (ModelNotFoundException $ex) {
            return response("Car doesnt exist.", 404);
        }
        
    }
}
