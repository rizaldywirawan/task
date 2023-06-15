<?php

namespace App\Actions\Project;

use App\Models\Project;
use App\Models\User;

class AssignUserToProject
{
    /**
     * Assign a user to a project
     */
    public function handle(Project $project, User $user): Project
    {
        $project->assignees()->attach($user->id);
        return $project->load('assignees');
    }
}
