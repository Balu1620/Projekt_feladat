<?php

namespace App\Http\Controllers;

use App\Models\DeviceSwitch;
use App\Models\Motorcycle;
use App\Http\Requests\StoreMotorcycleRequest;
use App\Http\Requests\UpdateMotorcycleRequest;
use App\Models\MotorRental;
use App\Models\Tool;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $query->where('location', $request->input('location'));
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
            ->select('location')
            ->distinct()
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
    public function store($motorId)
    {
        $userId = Auth::id();

        $startDate = session('startDate');
        $endDate = session('endDate');

        $sisakdb = session('sisakdb');
        $ruhadb = session('ruhadb');
        $cipodb = session('cipodb');

        $sisakmeret = session('sisakmeret');
        $ruhameret = session('ruhameret');
        $cipomeret = session('cipomeret');
        $motorRental = new MotorRental();
        $motorRental->users_id = $userId;
        $motorRental->motorcycles_id = $motorId;
        $motorRental->rentalDate = $startDate;
        $motorRental->returnDate = $endDate;
        //----- Bálint -----
        $motorRental->gaveDown = 0;
        $motorRental->jobStatus = 0;
        $motorRental->problemDescription = NULL;
        //----- Bálint -----

        $motorRental->save();

        //Példaként egy statikus érték.
        //BÁLINT CSAK EZT KELL!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        $matchingToolIds = [];
        // Ellenőrizzük, hogy legalább egy eszköz meg van-e adva
        if ($ruhadb >= 1 || $sisakdb >= 1 || $cipodb >= 1) {
            // Lekérjük az összes eszközt az adatbázisból
            $tools = DB::table('tools')->get();


            foreach ($tools as $tool) {
                // Sisak ellenőrzés
                if ($tool->toolName === 'Sisak' && in_array($tool->size, $sisakmeret)) {
                    $count = array_count_values($sisakmeret)[$tool->size] ?? 0; // Számoljuk, hányszor kell ez a méret
                    for ($i = 0; $i < $count; $i++) {
                        $matchingToolIds[] = $tool->id;
                    }
                }

                // Ruházat ellenőrzés
                if ($tool->toolName === 'Protektoros Ruha' && in_array($tool->size, $ruhameret)) {
                    $count = array_count_values($ruhameret)[$tool->size] ?? 0; // Számoljuk, hányszor kell ez a méret
                    for ($i = 0; $i < $count; $i++) {
                        $matchingToolIds[] = $tool->id;
                    }
                }

                // Cipő ellenőrzés
                if ($tool->toolName === 'Cipő' && in_array($tool->size, $cipomeret)) {
                    $count = array_count_values($cipomeret)[$tool->size] ?? 0; // Számoljuk, hányszor kell ez a méret
                    for ($i = 0; $i < $count; $i++) {
                        $matchingToolIds[] = $tool->id;
                    }
                }
            }

            // Lekérjük a legnagyobb kölcsönzés ID-t
            $maxLoanId = DB::table('loans')->max('id');

            // A megfelelő eszközök hozzárendelése a kölcsönzéshez
            foreach ($matchingToolIds as $toolId) {
                DeviceSwitch::create([
                    'loans_id' => $maxLoanId,
                    'tools_id' => $toolId,
                ]);
            }

            // Ellenőrzés céljából kiírjuk a megfelelő eszközök ID-it
            dd($matchingToolIds);
        }



        return view('pages.final_page', ['motorId' => $motorId, 'startDate' => $startDate, 'endDate' => $endDate, 'matchingToolIds' => $matchingToolIds, 'sisakdb' => $sisakdb, 'sisakmeret' => $sisakmeret, 'cipodb' => $cipodb, 'cipomeret' => $cipomeret]);
    }

    /*
    public function ToolsId()
    {
        $sisakdb = session('sisakdb');
        $ruhadb = session('ruhadb');

        $sisakmeret = session('sisakmeret');
        $ruhameret = session('ruhameret');

        $cipodb = session('cipodb');
        $cipomeret = session('cipomeret');



        $tools = DB::table('tools')->get();


        $matchingToolIds = [];

        
        if ($ruhadb >= 1 && $sisakdb >= 1 && $cipodb >= 1) {

            foreach ($tools as $tool) {
        
                // Ha a tool neve 'Sisak' és a méret megegyezik a keresett mérettel
                if ($tool->name == 'Sisak' && $tool->size == $sisakmeret) {
                    $matchingToolIds[] = $tool->id;  // Hozzáadjuk a tool id-ját
                }
        
                // Ha a tool neve 'Protektoros Ruha' és a méret megegyezik a keresett mérettel
                if ($tool->name == 'Protektoros Ruha' && $tool->size == $ruhameret) {
                    $matchingToolIds[] = $tool->id;  // Hozzáadjuk a tool id-ját
                }

                if ($tool->name == 'Cipő' && $tool->size == $cipomeret) {
                    $matchingToolIds[] = $tool->id;  // Hozzáadjuk a tool id-ját
                }
        
            }
        }
        

        session(['matchingToolIds' => $matchingToolIds]);

    }
    */



    /**
     * Display the specified resource.
     */

    public function showData(Motorcycle $motor, Request $request)
    {
        //NE SZEDDDDDD KIIIIIIIIII
        $sisakdb = $request->query('sisakdb', 0);
        $ruhadb = $request->query('ruhadb', 0);
        $cipodb = $request->query('cipodb', 0);

        $startDateRaw = $request->query('date-range-picker-start-date-myDateRangePickerDisabledDates');
        $endDateRaw = $request->query('date-range-picker-end-date-myDateRangePickerDisabledDates');
        $startDate = Carbon::createFromFormat('Y. m. d.', $startDateRaw);
        $endDate = Carbon::createFromFormat('Y. m. d.', $endDateRaw);
        $sisakmeret = $request->input('sisakmeret', []);
        $ruhameret = $request->input('ruhameret', []);
        $cipomeret = $request->input('cipomeret', []);

        if ($startDate && $endDate) {
            //Napok száma kiszámítása
            $days = $startDate->diffInDays($endDate) + 1;

            $dailyPrice = $motor->price;

            $motorBasePrice = $days * $dailyPrice;


            $helmetDeposit = 20000;
            $helmetDailyPrice = 5000;
            $helmetCost = $sisakdb * ($helmetDeposit + ($days * $helmetDailyPrice));

            $bootDeposit = 25000;
            $bootDailyPrice = 8000;
            $bootCost = $cipodb * ($bootDeposit + ($days * $bootDailyPrice));

            $clothingDeposit = 30000;
            $clothingDailyPrice = 10000;
            $clothingCost = $ruhadb * ($clothingDeposit + ($days * $clothingDailyPrice));

            $basePrice = $motorBasePrice + $helmetCost + $clothingCost + $bootCost;

            $discount = 0;
            if ($days >= 7) {
                $discount = $basePrice * 0.30;
            } elseif ($days >= 3) {
                $discount = $basePrice * 0.20;
            }

            $payable = $basePrice - $discount;


            session([
                'startDate' => $startDate,
                'endDate' => $endDate,
                'sisakdb' => $sisakdb,
                'ruhadb' => $ruhadb,
                'sisakmeret' => $sisakmeret,
                'ruhameret' => $ruhameret,
                'cipodb' => $cipodb,
                'cipomeret' => $cipomeret
            ]);


            return view('pages.summary_page', compact('motor', 'sisakdb', 'ruhadb', 'cipodb', 'startDate', 'endDate', 'startDateRaw', 'endDateRaw', 'discount', 'payable', 'basePrice', 'helmetCost', 'bootCost', 'clothingCost', 'helmetDeposit', 'clothingDeposit', 'bootDeposit', 'clothingDailyPrice', 'helmetDailyPrice', 'bootDailyPrice', 'sisakmeret', 'ruhameret', 'cipomeret'));



        }

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
