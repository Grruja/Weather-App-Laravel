<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->getOutput()->ask('How much users do you want?', 500);
        $password = $this->command->getOutput()->ask('What password should be?', 123456);

        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++)
        {
            \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}

