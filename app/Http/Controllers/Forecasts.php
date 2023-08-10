<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class Forecasts extends Controller
{
    public function search(Request $request) {
        $city = $request->get('city');

        $cities = Cities::where('city', 'LIKE', '%'.$city.'%')->get();

        return view('searched_forecast', compact('cities'));
    }
}
