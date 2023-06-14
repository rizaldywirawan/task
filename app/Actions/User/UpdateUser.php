<?php

namespace App\Actions\User;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UpdateUser
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected UpdateUserRequest $formRequest)
    {
    }


    /**
     * Update the existing user
     *
     * @throws ValidationException
     */
    public function handle(array $request, User $user): User
    {
        $validatedRequest = $this->validate($request);
        $user->update($validatedRequest);
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
