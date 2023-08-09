<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_forecasts extends Controller
{
    public function add_forecast(Request $request)
    {
        $request->validate
        ([
            'city_id' => 'required | exists:cities,id',
            'temp' => 'required|numeric',
            'weather_type' => 'required',
            'probability' => 'numeric|min:1|max:100',
            'date_forecast' => 'required',
        ]);

        Forecasts::create($request->all());

        return redirect()->back();
    }
}
