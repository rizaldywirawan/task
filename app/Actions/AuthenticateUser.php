<?php

namespace App\Actions;

use App\Http\Requests\Auth\StoreLoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateUser
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected StoreLoginRequest $formRequest)
    {
    }

    /**
     * Authenticate a user
     *
     * @throws ValidationException
     * @throws AuthenticationException
     */
    public function handle(array $request): ?Authenticatable
    {
        $validatedRequest = $this->validate($request);

        if (Auth::attempt([
            'email' => $validatedRequest['email'],
            'password' => $validatedRequest['password']
        ])) {

            return Auth::user();

        } else {
            throw new AuthenticationException('Your credentials do not match.');
        }

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
