<?php

namespace Tests\Feature;

use App\Models\FavoriteAlbum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class FavoriteAlbumTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A feature test for favorite albums in user profile.
     */
    public function test_a_user_can_get_all_favorite_albums()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $response = $this->get(route('favorite-albums.index'));

        $response->assertStatus(200);
    }

    public function test_a_user_can_create_favorite_album()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        return $this->postJson(route('favorite-albums.store'), [
            'album_name' => fake()->name(),
            'artist_name' => fake()->firstNameMale(),
            'album_url' => fake()->url(),
            'image' => fake()->imageUrl(),
            'user_id' => $user->id,
        ])
            ->assertStatus(201);
    }

    public function test_a_user_can_get_current_favorite_album()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $favAlbum = FavoriteAlbum::factory()->create();

        $this->get('favorite-albums/'.$favAlbum->id);
    }

    public function test_a_user_can_delete_current_favorite_album()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        $favAlbum= FavoriteAlbum::factory()->create();

        $this->delete('favorite-albums/'.$favAlbum->id);
    }
}
