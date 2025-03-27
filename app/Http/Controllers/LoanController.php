<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLoanRequest $request)
    {
        $rental = Loan::create([
            'rentalDate' => $request->rentalDate,
            'returnDate' => $request->returnDate,
            'motorcycles_id' => $request->motorcycles_id,
            'users_id' => Auth::id(),

        ]);

        // Visszaigazolás megjelenítése
        return redirect()->route('rentals.pending')->with('message', 'A bérlési szándékot rögzítettük. Hamarosan visszajelzünk!');
    }

    public function showLoans()
    {
        $userId = auth()->id();

        // Módosítsd a szűrést a helyes oszlopnévvel
        $loans = Loan::with([
            'deviceSwitches.tool',
            'user',
            'motorcycle'
        ])
            ->where('users_id', $userId)  // Használd a megfelelő oszlopot
            ->get()
            ->map(function ($loan) {
                return [
                    'user_name' => $loan->user->name,
                    'motorcycle' => [
                        'brand' => $loan->motorcycle->brand,
                        'type' => $loan->motorcycle->type,
                    ],
                    'tools' => $loan->deviceSwitches->map(function ($switch) {
                        return [
                            'tool_name' => $switch->tool->toolName,
                            'connected_at' => $switch->created_at->format('Y.m.d H:i'),
                        ];
                    }),
                    'rental_period' => [
                        'rentalDate' => $loan->rentalDate,
                        'returnDate' => $loan->returnDate,
                    ],
                ];
            });

        return view('userProfile', compact('loans'));
    }





    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
