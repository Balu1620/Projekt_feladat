<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Requests\UpdateMotorcycleRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\DeviceSwitch;
use App\Models\Loan;
use App\Models\Log;
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

        // Minden kölcsönzési adat lekérése
        //$loans = Loan::with('motorcycle', 'user')->get();

        // Minden felhasználó adatainak lekérése
        //$deviceSwitches = DeviceSwitch::with('loan','tool')->get();

        $loans = Loan::with([
            'user',
            'motorcycle',
            'deviceSwitches.tool'
        ])->get();

        if (!$loans) {
            return response()->json(["msg" => "nem sikerült a lekérés"], 404);
        }
        return response()->json([
            'loans' => $loans,
            //'users' => $deviceSwitches,
            //"msg" => "sikeres lekérés",
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Motorcycle::create($request->all());
        if (!$user) {
            return response()->json(['message' => 'Nem tudta eltárolni'], 404);
        }
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
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
    public function MotorRetrieveUpdate(UpdateLoanRequest $request, Loan $loan, UpdateMotorcycleRequest $motorRequest, Motorcycle $motorcycle)
    {
        $loan->update($request->all());
        $motorcycle->update($motorRequest->all());
        if (!$loan && !$motorcycle) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$loan->id, $loan->gaveDown, $loan->problemDescription, $motorcycle, "msg" => "sikeres Frissités!!!"]);
    }

    public function MotorReceiptUpdate(UpdateMotorcycleRequest $request, Motorcycle $motorcycle)
    {
        $motorcycle->update($request->all());
        if (!$motorcycle) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$motorcycle, "msg" => "sikeres Frissités!!!"]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $motor = Motorcycle::find($id);
        if (!$motor) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $motor->delete();
        return response()->json(['message' => 'User deleted'], 200);
        */
    }

    /*
    public function Getuser(User $user)
    {
        if (!$user) {
            return response()->json([$user, 'message' => 'lekérni'], 404);
        }
        return response()->json([$user, "msg" => "sikeres lekérés!!!"]);
    }
*/
    public function AllLogindex()
    {
        $logs = Admin::with(
            "logs"
        )->orderBy("jobstatus", "asc")->get();
        if (!$logs) {
            return response()->json([$logs, 'message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$logs, "msg" => "sikeres Frissités!!!"]);
    }

    public function UpdateAdmin(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->all());
        if (!$admin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$admin, "msg" => "sikeres Módosítás!!!"]);
    }
    public function StoreAdmin(StoreAdminRequest $request)
    {
        $newAdmin = Admin::create($request->all());
        if (!$newAdmin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$newAdmin, "msg" => "sikeres Frissités!!!"]);
    }

    public function DeactiveAdmin(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->delete();
        if (!$admin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$admin, "msg" => "sikeres Deaktiválás!!!"]);
    }

    public function AllUseres()
    {
        $admin = User::all();
        if (!$admin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$admin, "msg" => "sikeres Userek lekérése!!!"]);
    }

    public function DriLicRealSetUpUseres(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        if (!$user) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$user, "msg" => "sikeres Frissités!!!"]);
    }
}
