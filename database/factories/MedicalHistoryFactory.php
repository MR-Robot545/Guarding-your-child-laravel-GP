<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalHistory>
 */
class MedicalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $kidID=6;
    public function definition(): array
    {
        self::$kidID++;
        return [
            'specialNeeds' => NULL,
            'chronicConditions' => NULL,
            'bloodType' => NULL,
            'previousSurgeries' => NULL,
            'allergies' => NULL,
            'kid_id'=>self::$kidID-1,
        ];
    }
}
