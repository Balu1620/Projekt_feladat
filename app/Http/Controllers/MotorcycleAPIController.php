<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreMotorcycleRequest;
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
use Storage;

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
    public function store(StoreMotorcycleRequest $request)
    {

        // Kép fájl kezelése
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = str_replace(' ', '', $request->type) . "." . $image->getClientOriginalExtension();
            // Kép fájl eltárolása a storage-ban
            $imagePath = $image->storeAs('img', $imageName, 'public');
        }
        else {
            return response()->json([
                'message' => 'Hiba történt a kép feltöltésekor!',
            ], 400); // Visszaküldheted a hibát 400-as státusszal
        }

        $motor = Motorcycle::create([
            'brand' => $request->brand,
            'type' => $request->type,
            'licencePlate' => $request->licencePlate,
            'year' => $request->year,
            'gearbox' => $request->gearbox,
            'fuel' => $request->fuel,
            'powerLe' => $request->powerLe,
            'powerkW' => $request->powerkW,
            'engineSize' => $request->engineSize,
            'drivingLicence' => $request->drivingLicence,
            'places' => $request->places,
            'price' => $request->price,
            'deposit' => $request->deposit,
            'trafficDate' => $request->trafficDate,
            'location' => $request->location,
            'image' => $imageName,  // Kép neve elmentése
            'isInService' => $request->isInService,
            'problamComment' => $request->problamComment,
        ]);

        return response()->json([
            $motor,
            'message' => 'Kép és adat sikeresen feltöltve!',
            'image_path' => Storage::url($imagePath),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user, 200);
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

    public function MotorUpdate(UpdateMotorcycleRequest $request, Motorcycle $motorcycle)
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

    public function DeactiveAdmin(Admin $admin)
    {
        $admin->delete();
        if (!$admin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$admin, "msg" => "sikeres Deaktiválás!!!"]);
    }

    public function AllUseres()
    {
        $users = User::all();

        // Minden userhez hozzátesszük az image URL-t
        $users = $users->map(function ($user) {
            $user->drivingLicenceImage = $user->drivingLicenceImage
                ? asset('storage/' . $user->drivingLicenceImage)
                : null;

            $user->drivingLicenceImageBack = $user->drivingLicenceImageBack
                ? asset('storage/' . $user->drivingLicenceImageBack)
                : null;

            return $user;
        });

        return response()->json([
            'users' => $users,
            'msg' => 'Sikeres felhasználók lekérése!'
        ], 200);
    }


    public function DriLicRealSetUpUseres(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        if (!$user) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$user, "msg" => "sikeres Frissités!!!"]);
    }

    public function allMotorSearchInService()
    {
        $motor = Motorcycle::where('IsInService', 0)->get();
        if (!$motor) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$motor, "msg" => "sikeres Frissités!!!"]);
    }

    public function MotorDelete(Motorcycle $motorcycle)
    {
        if ($motorcycle->delete()) { // Soft Delete-et hajt végre
            return response()->json(["msg" => "Sikeres törlés!"]);
        }

        return response()->json(['message' => 'Nem sikerült törölni'], 500);
    }


    public function indexMotors()
    {
        // Lekérjük az összes motort
        $motors = Motorcycle::all();

        // Minden motorhoz hozzácsapunk egy image_url mezőt
        $motors = $motors->map(function ($motor) {
            $imagePath = 'img/' . $motor->image; // például: img/Gladiator.jpg
            $fullPath = storage_path("app/public/{$imagePath}");

            /*
            $motor->image_url = file_exists($fullPath)
                ? asset("storage/{$imagePath}")
                : null; 
            */
            $motor->image = file_exists($fullPath)
                ? asset("storage/{$imagePath}")
                : null;

            return $motor;
        });


        // Külön lekérjük az egyedi típusokat képpel együtt
        $types = Motorcycle::distinct()->pluck('type');

        $photos = $types->map(function ($type) {
            $cleanType = str_replace(' ', '', strtolower($type));
            $filePath = "img/{$cleanType}.jpg";
            $fullPath = storage_path("app/public/{$filePath}");

            return [
                'type' => $type,
                'image_url' => file_exists($fullPath)
                    ? asset("storage/{$filePath}")
                    : null
            ];
        });

        return response()->json([
            'motors' => $motors,
            'msg' => 'Sikeres motor lekérés!'
        ], 200);
    }

}
