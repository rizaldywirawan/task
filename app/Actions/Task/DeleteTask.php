<?php

namespace App\Actions\Task;

use App\Models\Project;
use App\Models\Task;
use Exception;

class DeleteTask
{
    /**
     * Delete the user
     * @throws Exception
     */
    public function handle(Task $task): Task
    {
        $deletedTask = $task;

        $isDeleted = $task->delete();

        if ($isDeleted) {
            return $deletedTask;
        }

        throw new Exception('Something wen\'t wrong, call the administrator');

    }
}
