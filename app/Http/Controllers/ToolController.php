<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Motorcycle;
use App\Models\Tool;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use Carbon\Carbon;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($motor)
    {
        //Motor adatainak lekérése az id alapján
        $motorData = Motorcycle::findOrFail($motor);

        //Eszközök lekérése
        $tools = Tool::all();  //Eszközök listája

        //Foglalt dátumok lekérése csak az adott motorhoz
        $bookedDates = Loan::where('motorcycles_id', $motor) //Szűrés motor id alapján
            ->get(['rentalDate', 'returnDate'])
            ->flatMap(function ($loan) {
                return collect(Carbon::parse($loan->rentalDate)->daysUntil($loan->returnDate))
                    ->map(fn($date) => $date->format('Y-m-d'));
            })
            ->unique()
            ->values();

        //Motor adatainak és eszközök átadása a nézetnek
        return view('pages.tools', [
            'tools' => $tools,
            'motor' => $motorData,
            'bookedDates' => $bookedDates->toArray(), //JSON kompatibilis tömb átadása
        ]);
        

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
    public function store(StoreToolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolRequest $request, Tool $tool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        //
    }
}
