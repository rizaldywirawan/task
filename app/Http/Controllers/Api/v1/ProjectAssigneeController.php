<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Project\AssignUserToProject;
use App\Actions\Project\RemoveUserFromProject;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectAssignees\StoreProjectAssigneeRequest;
use App\Http\Resources\Projects\ProjectResource;
use App\Models\Project;
use App\Models\User;

class ProjectAssigneeController extends Controller
{
    /**
     * Get all project assignees
     */
    public function index(Project $project): ProjectResource
    {
        $project->load('assignees');
        return new ProjectResource($project);
    }


    /**
     * Assign a user to a project
     */
    public function store(StoreProjectAssigneeRequest $request, Project $project, AssignUserToProject $assignUserToProject): ProjectResource
    {
        $user = User::where('id', $request->input('user'))->firstOrFail();
        $assignedProject = $assignUserToProject->handle($project, $user);

        return new ProjectResource($assignedProject);
    }


    /**
     * Remove a user from a project
     */
    public function destroy(Project $project, User $user, RemoveUserFromProject $removeUserFromProject): ProjectResource
    {
        $removeUserFromProject->handle($project, $user);
        return new ProjectResource($project->load('assignees'));
    }
}
