<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->jobTitle,
            'description'   => fake()->paragraphs(3, true),
            'salary'        => fake()->numberBetween(5_000, 150_000),
            'location'      => fake()->city,
            'category'      => collect(Job::$categories)->random(),
            'experience'    => collect(Job::$experiences)->random(),
        ];
    }
}
