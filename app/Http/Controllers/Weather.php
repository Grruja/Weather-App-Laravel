<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\ValueObjects\capitalize;

class Weather extends Controller
{
    public function index()
    {
        $weather = \App\Models\Weather::all();

        return view('weather', compact('weather'));
    }
}
