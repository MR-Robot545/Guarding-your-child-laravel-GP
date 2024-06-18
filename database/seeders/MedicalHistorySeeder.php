<?php

namespace Database\Seeders;

use App\Models\MedicalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MedicalHistory::create([
            'specialNeeds' => 'None',
            'chronicConditions' => 'Asthma',
            'bloodType' => 'O+',
            'previousSurgeries' => 'Appendectomy',
            'allergies' => 'Peanuts',
            'kid_id' => 1,
        ]);

        MedicalHistory::create([
            'specialNeeds' => 'Hearing aid',
            'chronicConditions' => 'Diabetes',
            'bloodType' => 'A+',
            'previousSurgeries' => 'Tonsillectomy',
            'allergies' => 'Dust mites',
            'kid_id' => 2,
        ]);

        MedicalHistory::create([
            'specialNeeds' => 'Wheelchair',
            'chronicConditions' => 'Epilepsy',
            'bloodType' => 'B-',
            'previousSurgeries' => 'None',
            'allergies' => 'None',
            'kid_id' => 3,
        ]);

        MedicalHistory::create([
            'specialNeeds' => 'Visual impairment',
            'chronicConditions' => 'Hypertension',
            'bloodType' => 'AB+',
            'previousSurgeries' => 'Heart surgery',
            'allergies' => 'Penicillin',
            'kid_id' => 4,
        ]);

        MedicalHistory::create([
            'specialNeeds' => 'None',
            'chronicConditions' => 'None',
            'bloodType' => 'O-',
            'previousSurgeries' => 'Fracture repair',
            'allergies' => 'Shellfish',
            'kid_id' => 5,
        ]);
    }
}
