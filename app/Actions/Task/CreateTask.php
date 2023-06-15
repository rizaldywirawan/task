<?php

namespace App\Actions\Task;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Models\Task;
use Auth;
use Illuminate\Validation\ValidationException;

class CreateTask
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected StoreTaskRequest $formRequest)
    {
    }

    /**
     * Create new user
     *
     * @throws ValidationException
     */
    public function handle(array $request): Task
    {
        $validatedRequest = $this->validate($request);

        $userId = Auth::id();

        return Task::create([
            ...$validatedRequest,
            'created_by' => $userId
        ]);
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
