<?php

namespace App\Http\Controllers;

use App\Models\Forecasts;
use Illuminate\Http\Request;

class Admin_weather extends Controller
{
    public function temp_update(Request $request)
    {
        $city_id = $request->get('city_id');

        $weather = \App\Models\Weather::where(['city_id' => $city_id])->first();

        $weather->temp = $request->get('temp');
        $weather->save();

        return redirect()->back();
    }
}
