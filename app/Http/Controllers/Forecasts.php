<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class Forecasts extends Controller
{
    public function search(Request $request) {
        $city = $request->get('city');

        $cities = Cities::where('city', 'LIKE', '%'.$city.'%')->get();

        if (count($cities) == 0) {
            return redirect()->back()->with('error', 'There is no result for '.$city.'');
        }
        else {
            return view('searched_forecast', compact('cities'));
        }

    }
}
