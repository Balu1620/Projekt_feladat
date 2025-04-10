<?php

namespace App\Http\Controllers;

use App\Models\DeviceSwitch;
use App\Models\Loan;
use App\Models\Tool;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validálás
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phoneNumber' => 'required|string|max:20',
            'drivingLicenceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'drivingLicenceImageBack' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Felhasználói adatok frissítése
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;

        $updated = false; 

        // Driving licence image feltöltés és törlés
        if ($request->hasFile('drivingLicenceImage')) {

            // Új fájl mentése
            $filePath = $request->file('drivingLicenceImage')->store('driving_licence_images', 'public');
            $user->drivingLicenceImage = $filePath;
            $updated = true; 
        }

        // Driving licence image back feltöltés és törlés
        if ($request->hasFile('drivingLicenceImageBack')) {

            // Új fájl mentése
            $filePathBack = $request->file('drivingLicenceImageBack')->store('driving_licence_images', 'public');
            $user->drivingLicenceImageBack = $filePathBack;
            $updated = true; 
        }

        // Ha történt módosítás (kép frissítés), akkor állítsuk a drivingLicenceReal értékét 0-ra
        if ($updated) {
            $user->drivingLicenceReal = 0; // Állítsuk 0-ra
        }

        // Mentés
        $user->save();

        return redirect()->back()->with('success', 'Adatok frissítve!');
    }



    public function addToolToOrder(Request $request, $ordersId)
    {
        // Megkeressük a rendelést az orders_id alapján
        $order = Loan::where('orders_id', $ordersId)->first();

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

                return redirect()->back()->with('success', 'Új eszköz hozzáadva a rendeléshez.');
            } else {
                return redirect()->back()->with('error', 'Az eszköz nem található.');
            }
        }

        return redirect()->back()->with('error', 'Rendelés nem található.');
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
                            'tool_id' => $switch->tool->id,
                            'tool_name' => $switch->tool->toolName,
                            'tool_size' => $switch->tool->size,
                            'connected_at' => $switch->created_at->format('Y.m.d H:i'),
                        ];
                    }),
                    'rental_period' => [
                        'rentalDate' => $loan->rentalDate,
                        'returnDate' => $loan->returnDate,
                    ],
                ];
            });

        // Lekérjük az összes elérhető eszközt
        $availableTools = Tool::all();

        // Méret csoportosítása eszközönként
        $availableSizesByTool = Tool::all()->groupBy('tool_name')->map(function ($tools) {
            return $tools->pluck('size', 'size');
        });

        // Visszaküldjük a nézetbe az eszközöket és méreteket
        return view('userProfile', compact('loans', 'availableTools', 'availableSizesByTool'));
    }

    public function deleteOrder($ordersId)
    {
        // A rendelést az orders_id alapján keresjük
        $order = Loan::where('orders_id', $ordersId)->first();

        // Ha a rendelés megtalálható
        if ($order) {
            // Töröljük a rendelést
            $order->deviceSwitches()->delete();
            $order->delete();
            return redirect()->route('userProfile')->with('success', 'A rendelés sikeresen törölve!');
        }
    }

    public function destroy(Tool $tool)
    {
        // Megkeressük az első device_switch rekordot, amelyhez az adott eszköz tartozik
        $deviceSwitch = DeviceSwitch::where('tools_id', $tool->id)->first();

        if ($deviceSwitch) {
            // Az első rekord törlése
            $deviceSwitch->delete();

            return redirect()->route('userProfile')->with('success', 'Eszköz törlésre került.');
        } else {
            return redirect()->route('userProfile')->with('error', 'Eszköz nem található a rendelésben.');
        }
    }



}
