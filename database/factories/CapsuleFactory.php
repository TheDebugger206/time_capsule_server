<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Stevebauman\Location\Facades\Location;

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

        $ip = $this->faker->ipv4();
        $position = Location::get($ip);

        $countryName = $position && is_object($position) ? $position->countryName : null;
        $countryCode = $position && is_object($position) ? $position->countryCode : null;
        $regionCode = $position && is_object($position) ? $position->regionCode : null;
        $regionName = $position && is_object($position) ? $position->regionName : null;
        $cityName = $position && is_object($position) ? $position->cityName : null;
        $zipCode = $position && is_object($position) ? $position->zipCode : null;
        $latitude = $position && is_object($position) ? $position->latitude : null;
        $longitude = $position && is_object($position) ? $position->longitude : null;
        $timezone = $position && is_object($position) ? $position->timezone : null;

        return [
            "user_id" => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            "title" => $this->faker->unique()->catchPhrase(),
            "message" => $this->faker->realText(200),
            "reveal_date" => $revealDate,
            "is_revealed" => $revealDate < now() ? 1 : 0,
            'privacy' => $privacyOptions[$this->faker->randomElement(['private', 'public'])],
            "mood" => $this->faker->randomElement($moods),
            "ip" => $ip,
            "country_name" => $countryName,
            "country_code" => $countryCode,
            "region_code" => $regionCode,
            "region_name" => $regionName,
            "city_name" => $cityName,
            "zip_code" => $zipCode,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "timezone" => $timezone,
        ];

        // faker methods like title() paragraph() ... 
        // always use the latin language
        // so instead we can use 
        // catchPhrase() for titles 
        // realText(maxNbChars: n)
    }
}
