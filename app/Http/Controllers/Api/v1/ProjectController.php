<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Project\CreateProject;
use App\Actions\Project\DeleteProject;
use App\Actions\Project\UpdateProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\StoreProjectRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Http\Resources\Projects\ProjectCollection;
use App\Http\Resources\Projects\ProjectResource;
use App\Http\Resources\Users\UserResource;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ProjectCollection
    {
        return new ProjectCollection(Project::all());
    }


    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(StoreProjectRequest $request, CreateProject $createProject): ProjectResource
    {
        $project = $createProject->handle($request->all());
        return new ProjectResource($project);
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }


    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(UpdateProjectRequest $request, Project $project, UpdateProject $updateProject): ProjectResource
    {
        $updatedProject = $updateProject->handle($request->all(), $project);
        return new ProjectResource($updatedProject);
    }


    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(Project $project, DeleteProject $deleteProject): ProjectResource
    {
        return new ProjectResource($deleteProject->handle($project));
    }
}
