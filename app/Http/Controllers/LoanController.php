<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        
        $request->validate([
            'rentalDate' => 'required|date|after_or_equal:today',
            'returnDate' => 'required|date|after:rentalDate',
            'comment' => 'nullable|string|max:255',
            'motorcycles_id' => 'required|exists:motorcycles,id',
        ]);

        
        $rental = Loan::create([
            'rentalDate' => $request->rentalDate,
            'returnDate' => $request->returnDate,
            'comment' => $request->comment,
            'motorcycles_id' => $request->motorcycles_id,
            'users_id' => Auth::id(), 
        ]);

        
        return redirect()->route('rentals.success')->with('message', 'A bérlés sikeresen létrejött!');
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
