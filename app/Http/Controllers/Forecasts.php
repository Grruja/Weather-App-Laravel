<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Forecasts extends Controller
{
    public function search(Request $request) {
        $city = $request->get('city');

        $cities = Cities::with('today_forecast')
            ->where('city', 'LIKE', '%'.$city.'%')
            ->get();

        $favourite = [];
        if (Auth::user()) {
            $favourite = Auth::user()->favourite_cities;
            $favourite = $favourite->pluck('city_id')->toArray();
        }

        if (count($cities) == 0) {
            return redirect()->back()->with('error', 'There is no result for '.$city.'');
        }
        else {
            return view('searched_forecast', compact('cities', 'favourite'));
        }
    }
}
