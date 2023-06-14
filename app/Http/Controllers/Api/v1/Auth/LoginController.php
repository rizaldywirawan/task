<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Actions\AuthenticateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Http\Resources\Users\UserResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Authenticate a user
     *
     * @throws AuthenticationException
     * @throws ValidationException
     */
    public function store(StoreLoginRequest $request, AuthenticateUser $authenticateUser): array
    {
        return $authenticateUser->handle($request->all());
    }
}
