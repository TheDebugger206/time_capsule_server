<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $privacyOptions = ['private' => 0, 'public' => 1];
        $moods = ['happy', 'sad', 'angry'];
        $revealDate = $this->faker->dateTimeBetween('-2 years', '+1 years')->format('Y-m-d');

        return [
            "user_id" => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            "title" => $this->faker->unique()->catchPhrase(),
            "message" => $this->faker->realText(200),
            "reveal_date" => $revealDate,
            "is_revealed" => $revealDate < now() ? 1 : 0,
            'privacy' => $privacyOptions[$this->faker->randomElement(['private', 'public'])],
            "mood" => $this->faker->randomElement($moods),
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
        ];

        // faker methods like title() paragraph() ... 
        // always use the latin language
        // so instead we can use 
        // catchPhrase() for titles 
        // realText(maxNbChars: n)
    }
}
