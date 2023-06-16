<?php

namespace App\Actions\Task;

use App\Actions\CreateValidatorUsingFormRequest;
use App\Http\Requests\Tasks\UpdateTaskOrderRequest;
use App\Models\Task;
use Illuminate\Validation\ValidationException;

class UpdateTaskOrder
{
    public function __construct(protected CreateValidatorUsingFormRequest $createValidatorUsingFormRequest, protected UpdateTaskOrderRequest $formRequest)
    {
    }

    /**
     * Arrange the tasks' order
     * @throws ValidationException
     */
    public function handle(array $request, Task $task): Task
    {
        $validatedRequest = $this->validate($request);

        $oldOrder = $task->order;
        $newOrder = $oldOrder + $validatedRequest['movement'];


        // change the other tasks order
        if ($validatedRequest['movement'] > 0) {
            Task::whereBetween('order', [$oldOrder + 1, $newOrder])->decrement('order');
        } else {
            Task::whereBetween('order', [$newOrder, $oldOrder - 1])->increment('order');
        }


        $task->order = $newOrder;
        $task->save();

        return $task;

    }


    /**
     * Create the validation using the existing form request
     *
     * @throws ValidationException
     */
    protected function validate(array $request): array
    {
        return $this->createValidatorUsingFormRequest->handle($request, $this->formRequest)
            ->validate();
    }
}
