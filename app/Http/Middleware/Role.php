<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $peran)
    {
        $this->auth = auth()->user() ? (auth()->user()->peran === $peran) : false;

        if ($this->auth === true)
            return $next($request);

        return abort(404);
    }
}
