<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guardian::create([
           'SSN_father'=>'565466432',
            'father_name'=>'ismail',
            'SSN_mother'=>'6456413',
            'mother_name'=>'mom1',
            'address'=>'Imbaba',
            'phone'=>'01015496477',
            'kid_id'=>1
        ]);
        Guardian::create([
            'SSN_father'=>'565455432',
            'father_name'=>'mohamed',
            'SSN_mother'=>'6456233',
            'mother_name'=>'mom2',
            'address'=>'October',
            'phone'=>'01015496488',
            'kid_id'=>2
        ]);
        Guardian::create([
            'SSN_father'=>'565444432',
            'father_name'=>'tarek',
            'SSN_mother'=>'6456323',
            'mother_name'=>'mom3',
            'address'=>'Giza',
            'phone'=>'01015496422',
            'kid_id'=>3
        ]);
        Guardian::create([
            'SSN_father'=>'565466982',
            'father_name'=>'diaa',
            'SSN_mother'=>'6456553',
            'mother_name'=>'mom4',
            'address'=>'Tagom3',
            'phone'=>'01015496411',
            'kid_id'=>4
        ]);
        Guardian::create([
            'SSN_father'=>'522466432',
            'father_name'=>'farag',
            'SSN_mother'=>'6456455',
            'mother_name'=>'mom5',
            'address'=>'Instant',
            'phone'=>'01015496227',
            'kid_id'=>5
        ]);
    }
}
