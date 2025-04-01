<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phoneNumber' => 'required|string|max:20',
            'drivingLicenceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'drivingLicenceImageBack' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;

        
        if ($request->hasFile('drivingLicenceImage')) {
            $imagePath = $request->file('drivingLicenceImage')->store('uploads', 'public');
            $user->drivingLicenceImage = 'storage/' . $imagePath;
        }

        
        if ($request->hasFile('drivingLicenceImageBack')) {
            $imagePathBack = $request->file('drivingLicenceImageBack')->store('uploads', 'public');
            $user->drivingLicenceImageBack = 'storage/' . $imagePathBack;
        }

        $user->save();

        return redirect()->back()->with('success');
    }

    public function showLoans()
    {
        $userId = auth()->id();

        
        $loans = Loan::with([
            'deviceSwitches.tool',
            'user',
            'motorcycle'
        ])
            ->where('users_id', $userId)  
            ->get()
            ->map(function ($loan) {
                return [
                    'user_name' => $loan->user->name,
                    'orders_id' => $loan->orders_id,
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
}
