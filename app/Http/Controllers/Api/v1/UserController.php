<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Resources\Users\UserResource;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Create new user
     *
     * @throws ValidationException
     */
    public function store(StoreRegisterRequest $request, CreateUser $createUser): UserResource
    {
        $user = $createUser->handle($request->all());
        return new UserResource($user);
    }
}
