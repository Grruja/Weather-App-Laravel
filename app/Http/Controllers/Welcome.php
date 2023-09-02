<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Welcome extends Controller
{
    public function favourite() {
        $favourite = [];

        if (Auth::check()) {
            $favourite = \App\Models\User_cities::with('cities')
                ->where(['user_id' => Auth::user()->id])
                ->get();
        }

        return view('welcome', compact('favourite'));
    }
}
