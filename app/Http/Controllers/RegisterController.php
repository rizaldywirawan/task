<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    /**
     * Display registration page
     */
    public function index(): View
    {
        return view('pages.register.index');
    }
}
