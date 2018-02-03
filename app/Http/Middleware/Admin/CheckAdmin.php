<?php

namespace App\Http\Middleware\Admin;

use Closure;

class CheckAdmin
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->group_id > 2) {
            return redirect('home');
        }

        return $next($request);
    }

}