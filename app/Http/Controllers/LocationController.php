<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show($location)
    {
        return view('location', ['location' => $location]);
    }
}
