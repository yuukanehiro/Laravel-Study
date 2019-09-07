<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\MyService;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = rand(0, count(MyService::alldata()));
        MyService::setId($id);
        $merge_data = [
            'id'      => $id,
            'msg'     => MyService::say(),
            'alldata' => MyService::alldata()
        ];
        $request->merge($merge_data);
        return $next($request);
    }
}
