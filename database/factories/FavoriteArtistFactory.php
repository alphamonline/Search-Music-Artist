<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteArtist>
 */
class FavoriteArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'artist_name' => fake()->firstNameMale(),
            'mbid' => fake()->swiftBicNumber,
            'url' => fake()->url(),
            'image' => fake()->imageUrl(),
            'user_id' => auth()->user()->id,
        ];
    }
}
