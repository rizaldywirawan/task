<?php

namespace App\Actions\Project;

use App\Models\Project;
use App\Models\User;

class RemoveUserFromProject
{
    public function handle(Project $project, User $user)
    {
        $project->assignees()->detach($user->id);

        return $project->load('assignees');
    }
}
