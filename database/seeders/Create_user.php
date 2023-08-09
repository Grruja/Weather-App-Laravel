<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Termwind\ask;

class Create_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = $this->command->getOutput()->ask('Name:');
        if (!$name)
        {
            $this->command->getOutput()->error('Name is required');
            return;
        }

        $email = $this->command->getOutput()->ask('Email:');
        if (!$email)
        {
            $this->command->getOutput()->error('Email is required');
            return;
        }
        $unique_email = \App\Models\User::where(['email' => $email])->first();
        if ($unique_email instanceof \App\Models\User)
        {
            $this->command->getOutput()->error('There is already a user with this email');
            return;
        }

        $password = $this->command->getOutput()->ask('Password:');
        if (!$password)
        {
            $this->command->getOutput()->error('Password is required');
            return;
        }

        \App\Models\User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->command->getOutput()->info('Success');
    }
}
