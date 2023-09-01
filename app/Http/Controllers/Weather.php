<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\ValueObjects\capitalize;

class Weather extends Controller
{
    public function index()
    {
        $weather = \App\Models\Weather::with('cities')
            ->get();

        return view('weather', compact('weather'));
    }
}
