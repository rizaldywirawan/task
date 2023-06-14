<?php

namespace App\Actions\User;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class CreateUser
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected StoreUserRequest $formRequest)
    {
    }

    /**
     * Create new user
     *
     * @throws ValidationException
     */
    public function handle(array $request): User
    {
        $validatedRequest = $this->validate($request);

        $user = new User();
        $user->email = $validatedRequest['email'];
        $user->password = $validatedRequest['password'];
        $user->name = $validatedRequest['name'];
        $user->save();

        return $user;
    }


    /**
     * Create the validation using the existing form request
     *
     * @throws ValidationException
     */
    protected function validate(array $request): array
    {
        return $this->createValidatorUsingFormRequest->handle($request, $this->formRequest)
            ->validate();
    }
}
