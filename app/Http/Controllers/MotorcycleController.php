<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Http\Requests\StoreMotorcycleRequest;
use App\Http\Requests\UpdateMotorcycleRequest;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motorcycle::all();
        return view('motors.index', ['motors' => $motors]);

        /*
        $query = Motorcycle::query();

        
        if ($request->has('brand')) {
            $query->where('brand', $request->input('brand'));
        }
        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }
        if ($request->has('gearbox')) {
            $query->where('gearbox', $request->input('gearbox'));
        }
        if ($request->has('fuel')) {
            $query->where('fuel', $request->input('fuel'));
        }
        if ($request->has('location')) {
            $query->where('location', 'LIKE', '%' . $request->input('location') . '%');
        }

        
        $motors = $query->get();

        $brands = Motorcycle::distinct()->pluck('brand');
        $years = Motorcycle::distinct()->orderBy('year')->pluck('year');
        $gearboxs = Motorcycle::distinct()->pluck('gearbox');
        $locations = Motorcycle::distinct()->pluck('location');

        return view('motors.motor', compact($motors, $brands, $years, $gearboxs, $locations));*/
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
    public function store(StoreMotorcycleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Motorcycle $motorcycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motorcycle $motorcycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotorcycleRequest $request, Motorcycle $motorcycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motorcycle $motorcycle)
    {
        //
    }
}
