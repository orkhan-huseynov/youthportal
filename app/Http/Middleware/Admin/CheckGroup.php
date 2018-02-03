<?php

namespace App\Http\Middleware\Admin;

use Closure;

class CheckGroup
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $group
     * @return mixed
     */
    public function handle($request, Closure $next, $group)
    {
        if ($request->user()->group_id > $group) {
            return redirect('admin');
        }

        return $next($request);
    }

}