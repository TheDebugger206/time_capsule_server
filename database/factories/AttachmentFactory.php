<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly choose between Image and Audio
        $attachableType = $this->faker->randomElement([Image::class, Audio::class]);

        // Create the related model
        $attachable = $attachableType::factory()->create();

        // Determine the type of URL to generate
        $url = $attachable instanceof Image
            ? $this->faker->imageUrl()
            : $this->faker->url();

        return [
            'url' => $url,
            'attachable_id' => $attachable->id,
            'attachable_type' => $attachableType,
        ];
    }
}
