<?php

namespace App\Actions\Task;

use App\Models\Task;
use App\Models\User;

class AssignUserToTask
{
    public function handle(Task $task, User $user): Task
    {
        $task->assignees()->attach($user->id);
        return $task->load('assignees');
    }
}
