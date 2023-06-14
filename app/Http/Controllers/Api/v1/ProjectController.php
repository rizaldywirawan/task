<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Project\CreateProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\StoreProjectRequest;
use App\Http\Resources\Projects\ProjectCollection;
use App\Http\Resources\Projects\ProjectResource;
use App\Models\Project;
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
     */
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
