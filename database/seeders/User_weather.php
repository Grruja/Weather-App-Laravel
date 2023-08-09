<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User_weather extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('What should be the city?');
        if(!$city)
        {
            $this->command->getOutput()->error('You must enter a city');
            return;
        }
        $duplicate_city = \App\Models\Weather::where(['city' => $city])->first();
        if ($duplicate_city)
        {
            $this->command->getOutput()->error('There is already city with that name');
            return;
        }

        $temp = $this->command->getOutput()->ask('What temperature should be?');
        if(!$temp)
        {
            $this->command->getOutput()->error('You must enter temperature');
            return;
        }

        \App\Models\Weather::create([
            'city' => $city,
            'temp' => $temp,
        ]);

        $this->command->getOutput()->info('Success');
    }
}
