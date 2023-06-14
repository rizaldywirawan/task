<?php

namespace App\Actions\Project;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\Projects\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class CreateProject
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected StoreProjectRequest $formRequest)
    {
    }


    /**
     * Create  project
     *
     * @throws ValidationException
     */
    public function handle(array $request): Project
    {
        $validatedRequest = $this->validate($request);

        $project = new Project();
        $project->name = $validatedRequest['name'];
        $project->save();

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
