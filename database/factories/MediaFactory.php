<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $mine_options = ['png' => 0, 'jpg' => 1];

        return [
            "title" => $this->faker->unique->words(3, true),
            "base64_data" => $this->faker->text(150),
            "mime_type" => $mine_options[$this->faker->randomElement(['png', 'jpg'])],
            "media_type" => $this->faker->unique->words(1, true),
            "filename" => $this->faker->unique->words(3, true),
        ];
    }
}