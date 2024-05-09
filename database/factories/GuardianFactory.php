<?php

namespace Database\Factories;

use App\Models\Kid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $kidID=6;
    public function definition(): array
    {
        //get father name
        $fatherName = Kid::find(self::$kidID)->last_name;
        self::$kidID++;
        return [
            'SSN_father'=>$this->faker->unique()->numerify('###-###-###'),
            'father_name'=>$fatherName,
            'SSN_mother'=>$this->faker->unique()->numerify('###-###-###'),
            'mother_name'=>$this->faker->firstName,
            'address'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'kid_id'=>self::$kidID-1,
        ];
    }
}
