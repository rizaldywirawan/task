<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

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
}
