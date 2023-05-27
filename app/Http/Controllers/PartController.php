<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartStoreRequest;
use App\Models\Car;
use App\Models\Part;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::all();
        return $parts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartStoreRequest $request)
    {
        $validated = $request->validated();

        try{
            $car = Car::findOrFail($request->part['car_id']);
        } catch (ModelNotFoundException $ex) {
            return response("Car doesn't exist.", 404);
        }
       

        $newPart = Part::create([
            'name' => $request->part["name"],
            'serial_number' => $request->part['serial_number'] ,
            'car_id' => $request->part['car_id'],
        ]);
        
         
        return $newPart;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $part = Part::find($id);
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
    public function update(PartStoreRequest $request, string $id)
    {
        $validated = $request->validated();
        try{
            $part = Part::findOrFail($id);
            $car = Car::findOrFail($request->part['car_id']);
            
            $part->name = $request->part["name"];
            $part->serial_number = $request->part['serial_number'];
            $part->car_id = $request->part['car_id'];
            $part->save();

            return $part;
        } catch (ModelNotFoundException $ex) {
            return response("Car doesn't exist.", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $part = Part::findOrFail($id);
            $part->delete();
            return response("Part Deleted.", 204);
        } catch (ModelNotFoundException $ex) {
            return response("Part doesn't exist.", 404);
        }
        
    }
}
