<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Forecasts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = \App\Models\Cities::all();

        foreach ($cities as $city)
        {
            $first_temp = rand(-10, 30);

            for ($i = 0; $i < 5; $i++)
            {
                $weathers = \App\Models\Forecasts::WEATHERS;
                $temp = rand($first_temp - 5, $first_temp + 5);
                $first_temp = $temp;

                if ($first_temp < -15)
                {
                    $first_temp = -15;
                }
                elseif ($first_temp  > 35)
                {
                    $first_temp = 35;
                }

                if ($temp < -10)
                {
                    $weather_remove = ['rainy'];
                    $weathers = array_diff($weathers, $weather_remove);
                }
                elseif ($temp > 15)
                {
                    $weather_remove = ['cloudy', 'snowy'];
                    $weathers = array_diff($weathers, $weather_remove);
                }
                elseif ($temp > 1)
                {
                    $weather_remove = ['snowy'];
                    $weathers = array_diff($weathers, $weather_remove);
                }

                $weather_type = array_rand($weathers);
                $probability = null;

                if ($weathers == 'rainy' || $weathers == 'snowy')
                {
                    $probability = rand(1, 100);
                }

                \App\Models\Forecasts::create([
                    'temp' => $temp,
                    'date_forecast' => Carbon::now()->addDays(rand(1, 30)),
                    'city_id' => $city->id,
                    'weather_type' => $weathers[$weather_type],
                    'probability' => $probability,
                ]);
            }
        }
    }
}
