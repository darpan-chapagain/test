<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(2,51),
            'job_category_id' => rand(1,5),
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->sentence(),
            'size' => $this->faker->numerify('##########'),
            // 'time' => $this->faker->unixTime(),
            'experience' => $this->faker->randomElement(['Intermediated', 'Expert', 'Entry']),
            'salary_offered' => $this->faker->numerify('#####'),
            'status' => 1,
        ];
    }
}
