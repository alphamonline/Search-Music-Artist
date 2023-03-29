<?php

namespace Tests\Feature;

use App\Models\FavoriteArtist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoriteArtistTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A feature test for favorite artists in user profile.
     */
    public function test_get_all_favorite_artists()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $response = $this->get(route('favorite-artists.index'));

        $response->assertStatus(200);
    }

    public function test_a_user_can_create_favorite_artist()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        return $this->postJson(route('favorite-artists.store'), [
            'artist_name' => fake()->firstNameMale(),
            'mbid' => fake()->swiftBicNumber,
            'url' => fake()->url(),
            'image' => fake()->imageUrl(),
            'user_id' => $user->id,
        ])
            ->assertStatus(201);
    }

    public function test_a_user_can_get_current_favorite_artist()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $favArtist= FavoriteArtist::factory()->create();

        $this->get('favorite-artists/'.$favArtist->id);
    }

    public function test_a_user_can_update_current_favorite_artist()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $favArtist = FavoriteArtist::factory()->create();

        return $this->putJson(('favorite-albums/'.$favArtist->id), [
            'artist_name' => 'BTS',
            'user_id' => $user->id,
        ]);
    }

    public function test_a_user_can_delete_current_favorite_artist()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $favArtist= FavoriteArtist::factory()->create();

        $this->delete('favorite-artists/'.$favArtist->id);
    }
}
