<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Invalidate the authenticated user session
     */
    public function destroy(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }
}
