<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    const DEFAULT_USER_SCOPE = 'default';

    public function login(Request $request)
    {
        //Validate User Request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //If User email doesn't exist the credentials will not match
        if(!Auth::validate($request->all())) {
            return $this->response(null, 'Invalid credentials', 403);
        }

        $user = User::where('email', $request->get('email'))->firstOrFail();

        return $this->issueUserToken($user);
    }

    protected function issueUserToken(User $user)
    {
        $token = $user->createToken(self::DEFAULT_USER_SCOPE)->plainTextToken;

        return $this->response([
            'token' => $token
        ], 'Authentication successful');
    }

    public  function logout() : JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->response([], 'Authentication successful', 200);
    }
}
