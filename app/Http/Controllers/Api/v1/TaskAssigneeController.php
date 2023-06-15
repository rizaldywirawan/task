<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Task\AssignUserToTask;
use App\Actions\Task\RemoveUserFromTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\Assignees\StoreTaskAssigneeRequest;
use App\Http\Resources\Tasks\TaskResource;
use App\Models\Task;
use App\Models\User;

class TaskAssigneeController extends Controller
{
    /**
     * Get a task with the assignees
     */
    public function index(Task $task): TaskResource
    {
        $task->load('assignees');
        return new TaskResource($task);
    }


    /**
     * Assign a task with a user
     */
    public function store(StoreTaskAssigneeRequest $request, Task $task, AssignUserToTask $assignUserToTask): TaskResource
    {
        $user = User::where('id', $request->input('user'))->firstOrFail();
        $assignedTask = $assignUserToTask->handle($task, $user);

        return new TaskResource($assignedTask);
    }


    /**
     * Remove a user from a task
     */
    public function destroy(Task $task, User $user, RemoveUserFromTask $removeUserFromTask): TaskResource
    {
        $removeUserFromTask->handle($task, $user);
        return new TaskResource($task->load('assignees'));
    }
}
