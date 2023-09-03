<?php

namespace App\Console\Commands;

use App\Models\Cities;
use App\Models\Forecasts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Get_weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:weather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Open API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city');

        $city_exists = Cities::where(['city' => $city])->first();

        if(!$city_exists) {
            $response = Http::get('https://api.weatherapi.com/v1/forecast.json', [
                'key' => env('WEATHER_API_KEY'),
                'q' => $city,
                'days' => 5,
            ]);

            $json_response = $response->json();

            if(isset($json_response['error'])) {
                $this->getOutput()->error($json_response['error']['message']);
            }
            else {
                $db_city =  Cities::create([
                    'city' => $city,
                ]);

                foreach ($json_response['forecast']['forecastday'] as $forecast) {
                    Forecasts::create([
                        'temp' => $forecast['day']['avgtemp_c'],
                        'date_forecast' => $forecast['date'],
                        'city_id' => $db_city->id,
                        'weather_type' => strtolower($forecast['day']['condition']['text']),
                        'probability' => $forecast['day']['daily_chance_of_rain'],
                    ]);
                }
            }
        }
    }
}
