<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capsule>
 */
class CapsuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('en_US');
        $privacyOptions = ['private' => 0, 'public' => 1];

        return [
            "user_id" => 0,
            "title" => $faker->unique->words(3, true),
            "message" => $faker->paragraph,
            "reveal_date" => $faker->date(),
            "is_revealed" => false,
            'privacy' => $privacyOptions[$faker->randomElement(['private', 'public'])],
            "mood" => "happy",
        ];
    }
}
