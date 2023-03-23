<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavoriteAlbum>
 */
class FavoriteAlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'album_name' => fake()->name(),
            'artist_name' => fake()->firstNameMale(),
            'album_url' => fake()->url(),
            'image' => fake()->imageUrl(),
            'user_id' => auth()->user()->id,
        ];
    }
}
