<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kid>
 */
class KidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $index=5;

    public function definition(): array
    {
        self::$index++;
        return [
            'index'=>self::$index,
            'SSN'=>$this->faker->unique()->numerify('###-###-###'),
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'gender'=>$this->faker->randomElement(['male','female']),
            'birthDate'=>$this->faker->dateTimeBetween(now()->subYears(5)->format('Y-m-d'),now()->format('Y-m-d')),
            'doctor_id'=>User::where('role','doctor')->inRandomOrder()->first()->id,
        ];
    }
}
