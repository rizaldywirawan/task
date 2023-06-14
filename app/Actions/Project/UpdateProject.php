<?php

namespace App\Actions\Project;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UpdateProject
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected UpdateProjectRequest $formRequest)
    {
    }


    /**
     * Update the existing user
     *
     * @throws ValidationException
     */
    public function handle(array $request, Project $project): Project
    {
        $validatedRequest = $this->validate($request);
        $project->update($validatedRequest);
        return $project;
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
