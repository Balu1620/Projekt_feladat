<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Http\Requests\StoreMotorcycleRequest;
use App\Http\Requests\UpdateMotorcycleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    
    public function index(Request $request)
    {
        


        $query = DB::table('motorcycles');

        /* $UserRentalQuery = DB::table('loans')->
        select('rentalDate')->
        join('motorcycles', 'motorcycles.id', '=','loans.motorcycles_id')->get();

        $UserReturnQuery = DB::table('loans')->
        select('returnDate')->
        join('motorcycles', 'motorcycles.id', '=','loans.motorcycles_id')->get(); */

        // Feltételek hozzáadása
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
            $query->where('location', 'LIKE', "_{$request->input('location')}%");
        }
        /* if ($request->has('dateInterval')) {
            $UserRentalQuery->where("rentalDate", $request->input())
        } */

        // Lekérdezés végrehajtása
        $motorcycles = $query->get();

        // Kiegészítő lekérdezések
        $brands = DB::table('motorcycles')->select('brand')->distinct()->get();
        $locations = DB::table('motorcycles')
            ->select(DB::raw('SUBSTRING(location, 2, 2) AS location'))
            ->distinct()
            ->orderBy('location', 'asc')
            ->get();
        $years = DB::table('motorcycles')->select('year')->distinct()->orderBy('year', 'asc')->get();
        $gearboxes = DB::table('motorcycles')
            ->select(DB::raw("'Automata' AS gearbox"))
            ->union(
                DB::table('motorcycles')->select('gearbox')->distinct()->where('gearbox', '<>', 'automata')
            )
            ->get();

        return view('motors.index', compact('motorcycles', 'brands', 'locations', 'years', 'gearboxes'));
    }

    
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
    public function show($id)
    {
        $motor = Motorcycle::findOrFail($id); 
        return view('motors.show', compact('motor'));
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
