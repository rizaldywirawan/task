<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/login');
    }
}
