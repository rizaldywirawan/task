<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Task\AssignUserToTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\Assignees\StoreTaskAssigneeRequest;
use App\Http\Resources\Tasks\TaskResource;
use App\Models\Task;
use App\Models\User;

class TaskAssigneeController extends Controller
{
    /**
     * Assign a task with a user
     * @param StoreTaskAssigneeRequest $request
     * @param Task $task
     * @param AssignUserToTask $assignUserToTask
     * @return TaskResource
     */
    public function store(StoreTaskAssigneeRequest $request, Task $task, AssignUserToTask $assignUserToTask): TaskResource
    {
        $user = User::where('id', $request->input('user'))->firstOrFail();
        $assignedTask = $assignUserToTask->handle($task, $user);

        return new TaskResource($assignedTask);
    }
}
