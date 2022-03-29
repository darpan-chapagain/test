<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 51;
        return [
            'user_id' => $number++,
            'qualification' => $this->faker->randomElement(['Intermediated', 'Expert', 'Entry']),
            'hourly_rate' => $this->faker->numerify('##'),
            'project_rate' => $this->faker->numerify('####'),
            'experience' => $this->faker->randomElement(['Intermediated', 'Expert', 'Entry']),
            'employee_type' => $this->faker->randomElement(['Individual', 'Team']),
            'Job_Category_ID' =>  rand(1,3),
            // $faker->unique()->numberBetween($min = 1, $max = 50)
        ];
    }
}
