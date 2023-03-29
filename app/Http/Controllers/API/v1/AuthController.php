<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Store a newly created user in storage.
     */
    public function register(StoreUserRequest $request, AuthService $authService)
    {
        $user = $authService->createUser($request);

        return $this->issueUserToken($user);
    }
    /**
     * Get a created user in storage and login.
     */
    public function login(LoginUserRequest $request, AuthService $authService)
    {
        $user = $authService->loginUser($request);

        return $this->issueUserToken($user);
    }

    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json('User logged out!', 200);
    }

    protected function issueUserToken($user)
    {
        $token = $user->createToken('Login token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
