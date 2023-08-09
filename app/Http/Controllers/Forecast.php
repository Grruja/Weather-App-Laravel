<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecasts;
use Illuminate\Http\Request;

class Forecast extends Controller
{
    public function index(Cities $cities)
    {
        if ($cities)
        {
            return view('forecast_city', compact('cities'));
        }
        else
        {
            die('City does not exist');
        }
    }
}
