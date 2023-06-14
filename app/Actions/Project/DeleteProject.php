<?php

namespace App\Actions\Project;

use App\Models\Project;
use Exception;

class DeleteProject
{
    /**
     * Delete the user
     * @throws Exception
     */
    public function handle(Project $project): Project
    {
        $deletedProject = $project;

        $isDeleted = $project->delete();

        if ($isDeleted) {
            return $deletedProject;
        }

        throw new Exception('Something wen\'t wrong, call the administrator');

    }
}
