<?php

namespace App\Actions\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class GetTasks
{
    /**
     * Get all tasks
     */
    public function handle(): Collection
    {
        return Task::sortByOrder()->with(['assignees', 'project'])->get();
    }
}
