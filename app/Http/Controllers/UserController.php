<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Tool;
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

    public function addToolToOrder(Request $request, $ordersId)
    {
        // Megkeressük a rendelést az orders_id alapján
        $order = Loan::where('orders_id', $ordersId)->first();

        if ($order) {
            // Megkeressük az eszközt az ID alapján (a select ezt küldi el)
            $tool = Tool::find($request->input('tool_id'));

            if ($tool) {
                // Hozzákapcsoljuk az eszközt a rendeléshez a device_switches táblában
                $order->deviceSwitches()->create([
                    'tools_id' => $tool->id,
                    'loans_id' => $order->id, // ha szükséges manuálisan
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
        // Kapcsolódó rekordok törlése a device_switches táblából
        $tool->deviceSwitches()->delete(); // Itt a megfelelő kapcsolatot kell használni

        return redirect()->route('userProfile')->with('success', 'Eszköz törlésre került.');
    }
}
