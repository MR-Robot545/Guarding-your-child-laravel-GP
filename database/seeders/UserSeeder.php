<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'username'=>'admin',
            'password'=>Hash::make('123456789'),
            'role'=>'admin',
        ]);

        User::create([
           'username'=>'doctor1',
           'password'=>Hash::make('123456789'),
           'role'=>'doctor',
        ]);

        User::create([
            'username'=>'police1',
            'password'=>Hash::make('123456789'),
            'role'=>'police',
        ]);
    }
}
