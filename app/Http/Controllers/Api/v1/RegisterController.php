<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\Users\UserResource;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Register a new user, this one could use the UserController too, but for now we will separate it
     * @throws ValidationException
     */
    public function store(StoreUserRequest $request, CreateUser $createUser): UserResource
    {
        $user = $createUser->handle($request->all());
        return new UserResource($user);
    }
}
