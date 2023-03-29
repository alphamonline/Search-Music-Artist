<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getUserById(int $id)
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
