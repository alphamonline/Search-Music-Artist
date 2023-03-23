<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Auth Login feature test.
     */
    public function test_a_user_can_login_with_email_and_password()
    {
        $user = User::factory()->create();
        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_a_user_can_register_with_name_email_and_password()
    {
        $response = $this->postJson(route('user.register'), [
            'name' => 'Alpha',
            'email' => 'alphamonline@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_a_user_cannot_register_with_existing_email()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $this->postJson(route('user.register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertUnprocessable();
    }

    public function test_a_user_while_registering_missing_required_field()
    {
        $this->withExceptionHandling();

        $this->postJson(route('user.register'), [
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'email']);
    }

    public function test_a_user_while_registering_password_confirmation_match()
    {
        $this->withExceptionHandling();

        $this->postJson(route('user.register'), [
            'name' => 'Alpha',
            'email' => 'alpha@test.com',
            'password' => 'password',
            'password_confirmation' => 'word'
        ])
            ->assertStatus(422);
    }

    public function test_a_user_while_registering_password_confirmation()
    {
        $this->withExceptionHandling();

        $this->postJson(route('user.register'), [
            'name' => 'Alpha',
            'email' => 'alpha@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertOk();
    }

}
