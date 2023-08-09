<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cities extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('sr_Latn_RS');

        for ($i = 0; $i < 21; $i++)
        {
            \App\Models\Cities::create([
                'city' => $faker->unique()->city,
            ]);
        }
    }
}
