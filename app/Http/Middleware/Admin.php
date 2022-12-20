<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{

    public function handle(Request $request, Closure $next, $level = null)
    {
        $can_access = $level ? ($request->user()->is_admin === (int)$level) : $request->user()->is_admin;
        abort_unless($can_access, 403);
        return $next($request);
    }
}
