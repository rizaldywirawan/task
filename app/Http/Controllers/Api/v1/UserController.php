<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\CreateUser;
use App\Actions\User\DeleteUser;
use App\Actions\User\UpdateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\Users\UserCollection;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Get all users
     */
    public function index(): UserCollection
    {
        return new UserCollection(User::all());
    }


    /**
     * Get specific user
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }


    /**
     * Create new user
     *
     * @throws ValidationException
     */
    public function store(StoreUserRequest $request, CreateUser $createUser): UserResource
    {
        $user = $createUser->handle($request->all());
        return new UserResource($user);
    }


    /**
     * Update existing user
     *
     * @throws ValidationException
     */
    public function update(UpdateUserRequest $request, User $user, UpdateUser $updateUser): UserResource
    {
        $updatedUser = $updateUser->handle($request->all(), $user);
        return new UserResource($updatedUser);
    }


    /**
     * Delete the user
     *
     * @throws Exception
     */
    public function destroy(User $user, DeleteUser $deleteUser): User
    {
        return $deleteUser->handle($user);
    }
}
