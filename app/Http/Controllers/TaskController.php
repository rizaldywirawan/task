<?php

namespace App\Http\Controllers;

use App\Actions\Task\GetTasks;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    /**
     * Get all user's tasks
     */
    public function index(GetTasks $getTasks): View
    {
        $tasks = $getTasks->handle();
        return view('pages.index', compact('tasks'));
    }
}
