<?php

namespace App\Actions\Task;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Http\Requests\Tasks\UpdateTaskRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UpdateTask
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected UpdateTaskRequest $formRequest)
    {
    }


    /**
     * Update the existing user
     *
     * @throws ValidationException
     */
    public function handle(array $request, Task $task): Task
    {
        $validatedRequest = $this->validate($request);
        $task->update($validatedRequest);
        return $task;
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
