<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * This creates a new user record and initiates email verification
     *
     * @param Request $request
     *
     * @return mixed
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // TODO: Initiate verification process

        return $this->response( User::create($request->all()), 'User created successfully!' );
    }
}
