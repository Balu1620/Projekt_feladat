<?php

namespace App\Http\Controllers;

use App\Models\DeviceSwitch;
use App\Models\Loan;
use App\Models\Motorcycle;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;

class MotorcycleAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        $users = User::all();
        

       
        return response()->json([
            'loans' => $loans,
            'users' => $users,
            "msg" => "sikeres lekérés"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Motorcycle::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motor = User::find($id);
        if (!$motor) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($motor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motor = Motorcycle::find($id);
        if (!$motor) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $motor->update($request->all());
        return response()->json($motor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motor = Motorcycle::find($id);
        if (!$motor) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $motor->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}
