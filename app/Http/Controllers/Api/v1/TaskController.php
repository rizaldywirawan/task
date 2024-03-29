<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Task\CreateTask;
use App\Actions\Task\DeleteTask;
use App\Actions\Task\UpdateTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Resources\Tasks\TaskCollection;
use App\Http\Resources\Tasks\TaskResource;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): TaskCollection
    {
        return new TaskCollection(Task::all());
    }


    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(StoreTaskRequest $request, CreateTask $createTask): TaskResource
    {
        $task = $createTask->handle($request->all());
        return new TaskResource($task->load('createdBy', 'updatedBy', 'deletedBy', 'project'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }


    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, Task $task, UpdateTask $updateTask): TaskResource
    {
        $updatedTask = $updateTask->handle($request->all(), $task);
        return new TaskResource($updatedTask);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(Task $task, DeleteTask $deleteTask): TaskResource
    {
        return new TaskResource($deleteTask->handle($task));
    }
}
