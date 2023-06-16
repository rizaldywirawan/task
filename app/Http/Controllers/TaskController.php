<?php

namespace App\Http\Controllers;

use Auth;

class TaskController extends Controller
{
    /**
     * Get all user's tasks
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('tasks');

        return view('pages.index', compact('user'));
    }
}
