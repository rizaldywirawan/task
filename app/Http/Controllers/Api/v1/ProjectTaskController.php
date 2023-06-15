<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    /**
     * Get all project' tasks
     */
    public function index(Project $project): ProjectResource
    {
        $project->load('tasks');
        return new ProjectResource($project);
    }
}
