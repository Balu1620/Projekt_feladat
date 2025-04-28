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
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Storage;

class MotorcycleAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with([
            'user',
            'motorcycle',
            'deviceSwitches.tool'
        ])->get();

        if (!$loans) {
            return response()->json(["msg" => "nem sikerült a lekérés"], 404);
        }

        // Hozzáadjuk az asset URL-t minden loan userének
        $loans->map(function ($loan) {
            if ($loan->user) {
                $loan->user->drivingLicenceImage = $loan->user->drivingLicenceImage
                    ? (str_starts_with($loan->user->drivingLicenceImage, 'http')
                        ? $loan->user->drivingLicenceImage
                        : asset('storage/' . $loan->user->drivingLicenceImage))
                    : null;

                $loan->user->drivingLicenceImageBack = $loan->user->drivingLicenceImageBack
                    ? (str_starts_with($loan->user->drivingLicenceImageBack, 'http')
                        ? $loan->user->drivingLicenceImageBack
                        : asset('storage/' . $loan->user->drivingLicenceImageBack))
                    : null;
            }
            return $loan;
        });

        return response()->json([
            'loans' => $loans,
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
        } else {
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
        return response()->json([$loan->id, $loan->gaveDown, $motorcycle, "msg" => "sikeres Frissités!!!"]);
    }

    public function MotorUpdate(UpdateMotorcycleRequest $request, Motorcycle $motorcycle)
    {
        $motorcycle->update($request->all());
        if (!$motorcycle) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$motorcycle, "msg" => "sikeres Frissités!!!"]);
    }



    public function AllLogindex()
    {
        $logs = Admin::with([
            "logs" => function ($query) {
                $query->orderBy('date', 'desc');
            }
        ])->orderBy("jobstatus", "asc")->get();
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

    public function ReStoreAdmin(Admin $admin, UpdateAdminRequest $request)
    {
        $admin->update($request->all());
        //$admin->restore();
        if (!$admin) {
            return response()->json(['message' => 'Nem tudta frissiteni'], 404);
        }
        return response()->json([$admin, "msg" => "sikeres Deaktiválás!!!"]);
    }


    public function DeactiveAdmin(Admin $admin, UpdateAdminRequest $request)
    {
        $admin->update($request->all());
        //$admin->delete();
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




    //Reacthoz kell

    public function LoansDelete($ordersId)
    {
        $order = Loan::where('loans.id', $ordersId)->first();

        // Ha a rendelés megtalálható
        if ($order) {
            // Töröljük a rendelést
            $order->deviceSwitches()->delete();
            $order->delete();
            return response()->json([$order, "msg" => "Sikeresen töröltük"]);
        } else {
            return response()->json([$order, "msg" => "Nem sikerült törölni"]);
        }
    }

    public function ToolAddToOrder($ordersId, Request $request)
    {
        // Megkeressük a rendelést az orders_id alapján
        $order = Loan::where('loans.id', $ordersId)->first();

        if ($order) {
            // Megkeressük az eszközt az ID alapján
            $tool = Tool::find($request->input('tool_id'));

            if ($tool) {
                // Eszköztípusok ID alapú csoportosítása
                // 1-5: Sisak
                // 6-10: Ruha
                // 11-18: Cipő
                $ranges = [
                    'sisak' => [1, 5],
                    'protektoros ruha' => [6, 10],
                    'cipő' => [11, 18]
                ];

                // Ellenőrizzük, hogy az eszköz id-je melyik típusba tartozik
                $tulajdonosTípus = null;
                foreach ($ranges as $type => $range) {
                    if ($tool->id >= $range[0] && $tool->id <= $range[1]) {
                        $tulajdonosTípus = $type;
                        break;
                    }
                }

                if ($tulajdonosTípus) {
                    // Megszámoljuk, hány eszköz van már a rendeléshez kapcsolva az adott típusból
                    $jelenlegiDarab = $order->deviceSwitches()
                        ->whereHas('tool', function ($query) use ($tulajdonosTípus, $ranges) {
                            $range = $ranges[$tulajdonosTípus];
                            $query->where('id', '>=', $range[0]) // Minimum ID a típushoz
                                ->where('id', '<=', $range[1]); // Maximum ID a típushoz
                        })
                        ->count();

                    // Ha már elérte a maximumot (2 db), hibaüzenetet adunk vissza
                    if ($jelenlegiDarab >= 2) {
                        return redirect()->back()->with(
                            'error',
                            "Maximum 2 db {$tulajdonosTípus} eszköz bérelhető a rendeléshez!"
                        );
                    }
                }

                // Ha még nem érte el a maximumot, hozzáadjuk az eszközt
                $order->deviceSwitches()->create([
                    'tools_id' => $tool->id,
                    'loans_id' => $order->id,
                    'created_at' => now(),
                ]);

                return response()->json([$order, "msg" => "Sikeresen Hozzáadtuk"]);
            } else {
                return response()->json([$order, "msg" => "Sikertelen hozzáadás"]);
            }
        }
    }

    public function Motorindex(Request $request)
    {
        // Alap lekérdezés az "motorcycles" táblára
        $query = DB::table('motorcycles')
            ->leftJoin('loans', function ($join) {
                $join->on('motorcycles.id', '=', 'loans.motorcycles_id')
                    ->whereRaw('loans.id IN (SELECT MAX(id) FROM loans GROUP BY motorcycles_id)');
            })
            ->select('motorcycles.*', 'loans.rentalDate', 'loans.returnDate')
            ->where('motorcycles.isInService', 0);

        // Szűrési feltételek hozzáadása
        if ($request->filled('brand')) {
            $query->where('motorcycles.brand', $request->input('brand'));
        }
        if ($request->filled('year')) {
            $query->where('motorcycles.year', $request->input('year'));
        }
        if ($request->filled('gearbox')) {
            $query->where('motorcycles.gearbox', $request->input('gearbox'));
        }
        if ($request->filled('fuel')) {
            $query->where('motorcycles.fuel', $request->input('fuel'));
        }
        if ($request->filled('location')) {
            $query->where('motorcycles.location', $request->input('location'));
        }

        // Időszak szűrés
        if ($request->filled('dateStart') && $request->filled('dateEnd')) {
            $dateStart = Carbon::parse($request->input('dateStart'));
            $dateEnd = Carbon::parse($request->input('dateEnd'));

            $query->where(function ($subQuery) use ($dateStart, $dateEnd) {
                $subQuery->whereNull('loans.rentalDate')
                    ->orWhere('loans.returnDate', '<', $dateStart)
                    ->orWhere('loans.rentalDate', '>', $dateEnd);
            });
        }

        // Lekérdezés végrehajtása
        $motorcycles = $query->distinct()->get();

        // Kiegészítő lekérdezések szűrőkhöz
        $brands = DB::table('motorcycles')->select('brand')->distinct()->orderBy('brand', 'asc')->get();
        $locations = DB::table('motorcycles')->select('location')->distinct()->orderBy('location', 'asc')->get();
        $years = DB::table('motorcycles')->select('year')->distinct()->orderBy('year', 'asc')->get();
        $gearboxes = DB::table('motorcycles')->select('gearbox')->distinct()->get();

        return response()->json([
            'motorcycles' => $motorcycles,
            'filters' => [
                'brands' => $brands,
                'locations' => $locations,
                'years' => $years,
                'gearboxes' => $gearboxes,
            ],
        ]);
    }


    public function ReactDestroyTool(Tool $tool)
    {
        // Megkeressük az első device_switch rekordot, amelyhez az adott eszköz tartozik
        $deviceSwitch = DeviceSwitch::where('tools_id', $tool->id)->first();

        if ($deviceSwitch) {
            // Az első rekord törlése
            $deviceSwitch->delete();

            return response()->json([$tool, "msg" => "Eszköz törlése sikeres"]);
        } else {
            return response()->json([$tool, "msg" => "Eszköz törlése sikertelen"]);
        }
    }
    public function ReactShowLoans($userId)
    {
        // Felhasználó adatainak lekérése
        $user = User::find($userId);

        // Ellenőrizzük, hogy létezik-e a felhasználó
        if (!$user) {
            return response()->json(["msg" => "A felhasználó nem található"], 404);
        }

        // Kölcsönzések lekérése a kapcsolatokkal együtt
        $loans = Loan::with([
            'motorcycle',
            'deviceSwitches.tool'
        ])
            ->where('users_id', '=', $userId)
            ->get();

        // Asset URL-ek hozzáadása a felhasználói adatokhoz
        $user->drivingLicenceImage = $user->drivingLicenceImage
            ? (str_starts_with($user->drivingLicenceImage, 'http')
                ? $user->drivingLicenceImage
                : asset('storage/' . $user->drivingLicenceImage))
            : null;

        $user->drivingLicenceImageBack = $user->drivingLicenceImageBack
            ? (str_starts_with($user->drivingLicenceImageBack, 'http')
                ? $user->drivingLicenceImageBack
                : asset('storage/' . $user->drivingLicenceImageBack))
            : null;

        // JSON válasz, amely tartalmazza a felhasználó adatait és a kölcsönzéseket
        return response()->json([
            'user' => $user,
            'loans' => $loans,
            'userId' => $user->id, // Külön visszaküldheted a userId-t
        ], 200);



    }

    public function login(Request $request)
    {
        // Ellenőrizzük, hogy a felhasználó adatai helyesek-e
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // A bejelentkezett felhasználó adatainak lekérése
            $token = $user->createToken('YourAppName')->plainTextToken; // Token létrehozása

            // A válasz tartalmazza a token-t és a felhasználó ID-ját
            return response()->json([
                'token' => $token,
                'userId' => $user->id, // Az ID itt van
            ]);
        }

        // Ha nem sikerült a bejelentkezés, akkor hibaüzenet
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

}



