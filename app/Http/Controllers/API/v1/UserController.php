<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified user.
     */
    public function show(int $id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                'user' => $user,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
