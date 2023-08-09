<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Weather extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = \App\Models\Cities::all();

        foreach ($cities as $city)
        {
            \App\Models\Weather::create([
                'temp' => rand(14, 31),
                'city_id' => $city->id,
            ]);
        }
    }
}
