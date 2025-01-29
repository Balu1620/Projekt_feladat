<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class Motorcontroller extends Controller
{
    public function index(Request $request)
    {
        $query = Motor::query();

        
        if ($request->has('Marka')) {
            $query->where('Marka', $request->input('Marka'));
        }
        if ($request->has('Kor')) {
            $query->where('Kor', $request->input('Kor'));
        }
        if ($request->has('Sebessegvalto')) {
            $query->where('Sebessegvalto', $request->input('Sebessegvalto'));
        }
        if ($request->has('Uzemanyag')) {
            $query->where('Uzemanyag', $request->input('Uzemanyag'));
        }
        if ($request->has('Helyszin')) {
            $query->where('Helyszin', 'LIKE', '%' . $request->input('Helyszin') . '%');
        }

        
        $motors = $query->get();

        
        $markak = Motor::distinct()->pluck('Marka');
        $korok = Motor::distinct()->orderBy('Kor')->pluck('Kor');
        $valtok = Motor::distinct()->pluck('Sebessegvalto');
        $helyszinek = Motor::distinct()->pluck('Helyszin');

        return view('motors.index', compact('motors', 'markak', 'korok', 'valtok', 'helyszinek'));
    }
}
