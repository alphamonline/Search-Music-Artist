<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LastFmAPIsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A feature test for last.fm endpoints.
     */
    public function test_last_fm_endpoint_with_api_key_to_search_for_album(): \Illuminate\Testing\TestResponse|\Illuminate\Http\JsonResponse
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        try {
            return $this->get(route('search.album', 'flower'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function test_last_fm_endpoint_with_api_key_to_search_for_an_artist(): \Illuminate\Testing\TestResponse|\Illuminate\Http\JsonResponse
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        try {
            return $this->get(route('search.artist', 'bts'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function test_last_fm_endpoint_with_api_key_to_get_current_album(): \Illuminate\Testing\TestResponse|\Illuminate\Http\JsonResponse
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        try {
            return $this->get(route('current.album', 'bts/dynamite'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }

    public function test_last_fm_endpoint_with_api_key_to_get_current_artist(): \Illuminate\Testing\TestResponse|\Illuminate\Http\JsonResponse
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());

        try {
            return $this->get(route('current.artist', 'cher'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }

    }
}
