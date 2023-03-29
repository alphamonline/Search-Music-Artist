<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Display the specified user.
     */
    public function show(int $id, UserService $userService)
    {
        return $userService->getUserById($id);
    }
}
