<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_cities extends Controller
{
    public function favourite($city) {
        if (Auth::check()) {
            \App\Models\User_cities::create([
                'city_id' => $city,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back();
        }
        else {
            return redirect('/login');
        }
    }

    public function remove_favourite($city) {
        if (Auth::check()) {
            $favourite = \App\Models\User_cities::where([
                'city_id' => $city,
                'user_id' => Auth::user()->id,
            ])->first();

            if ($favourite) {
                $favourite->delete();
            }
            return redirect()->back();
        }
        else {
            return redirect('/login');
        }
    }
}
