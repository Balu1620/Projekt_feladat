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
        $query = DB::table('motorcycles')
            ->leftJoin('loans', 'motorcycles.id', '=', 'loans.motorcycles_id')
            ->select('motorcycles.*', 'loans.rentalDate', 'loans.returnDate');

        // Feltételek hozzáadása
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }
        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }
        if ($request->filled('gearbox')) {
            $query->where('gearbox', $request->input('gearbox'));
        }
        if ($request->filled('fuel')) {
            $query->where('fuel', $request->input('fuel'));
        }
        if ($request->filled('location')) {
            $query->where('location', 'LIKE', "_{$request->input('location')}%");
        }

        if ($request->filled('startDate') && $request->filled('endDate')) {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');

            $query->whereNotExists(function ($q) use ($startDate, $endDate) {
                $q->select(DB::raw(1))
                    ->from('loans')
                    ->whereRaw('loans.motorcycles_id = motorcycles.id')
                    ->where(function ($subQuery) use ($startDate, $endDate) {
                        $subQuery->where(function ($q1) use ($startDate, $endDate) {
                            // Ha a foglalás kezdődik az időintervallumon belül
                            $q1->whereBetween('loans.rentalDate', [$startDate, $endDate]);
                        })->orWhere(function ($q2) use ($startDate, $endDate) {
                            // Ha a foglalás befejeződik az időintervallumon belül
                            $q2->whereBetween('loans.returnDate', [$startDate, $endDate]);
                        })->orWhere(function ($q3) use ($startDate, $endDate) {
                            // Ha a foglalás teljesen lefedi az adott időintervallumot
                            $q3->where('loans.rentalDate', '<=', $startDate)
                                ->where('loans.returnDate', '>=', $endDate);
                        });
                    });
            });
        }

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

    public function showData($id){
        $motor = Motorcycle::findOrFail($id); 
        return view('pages.summary_page', compact('motor'));
        //NEHOGY KISZEDJ!!!!!!!!!!!!!!!!!!!!
        //A fő bérléshez kell, külön írtam hozzá egy functiont mert máshogy csak átdobott a showra.
     }
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
