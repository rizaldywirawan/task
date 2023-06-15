<?php

namespace App\Actions\Task;

use App\Models\Task;
use App\Models\User;

class RemoveUserFromTask
{
    /**
     * Remove a user from a task
     */
    public function handle(Task $task, User $user): Task
    {
        $task->assignees()->detach($user->id);

        return $task->load('assignees');
    }
}
