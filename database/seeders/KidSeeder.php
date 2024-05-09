<?php

namespace Database\Seeders;

use App\Models\Kid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kid::create([
           'index'=>1,
           'SSN'=>'123-456-789',
           'first_name'=>'ibrahim',
           'last_name'=>'ismail',
           'gender'=>'male',
           'birthDate'=>'2001-1-27',
            'doctor_id'=>1,
        ]);

        Kid::create([
            'index'=>2,
            'SSN'=>'123-546-788',
            'first_name'=>'abdelrahman',
            'last_name'=>'mohamed',
            'gender'=>'male',
            'birthDate'=>'2001-9-20',
            'doctor_id'=>1,
        ]);
        Kid::create([
            'index'=>3,
            'SSN'=>'123-546-755',
            'first_name'=>'abdelrahman',
            'last_name'=>'tarek',
            'gender'=>'male',
            'birthDate'=>'2001-2-2',
            'doctor_id'=>1,
        ]);
        Kid::create([
            'index'=>4,
            'SSN'=>'123-336-755',
            'first_name'=>'youssef',
            'last_name'=>'diaa',
            'gender'=>'male',
            'birthDate'=>'2001-3-3',
            'doctor_id'=>1,
        ]);
        Kid::create([
            'index'=>5,
            'SSN'=>'123-226-755',
            'first_name'=>'ziyad',
            'last_name'=>'farag',
            'gender'=>'male',
            'birthDate'=>'2001-5-9',
            'doctor_id'=>1,
        ]);
    }
}
