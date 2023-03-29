<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService
{
    public function createUser(Request $request): User
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
    }

    public function loginUser(Request $request): ?Authenticatable
    {
        $credentials = $request->validated();
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (Auth::attempt($credentials, $remember)) {
            return Auth::user();
        }

        return null;
    }
}
