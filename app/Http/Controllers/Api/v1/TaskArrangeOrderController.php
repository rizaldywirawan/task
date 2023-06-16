<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Task\UpdateTaskOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\UpdateTaskOrderRequest;
use App\Http\Resources\Tasks\TaskResource;
use App\Models\Task;
use Illuminate\Validation\ValidationException;

class TaskArrangeOrderController extends Controller
{
    /**
     * Change the tasks' order and the other tasks that affected
     * @throws ValidationException
     */
    public function update(UpdateTaskOrderRequest $request, Task $task, UpdateTaskOrder $updateTaskOrder): TaskResource
    {
        $movedTask = $updateTaskOrder->handle($request->all(), $task);
        return new TaskResource($movedTask);
    }
}
