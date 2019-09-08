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
        // ●beforeの処理・開始
        $id = rand(0, count(MyService::alldata()));
        MyService::setId($id);
        $merge_data = [
            'id'      => $id,
            'msg'     => MyService::say(),
            'alldata' => MyService::alldata()
        ];
        $request->merge($merge_data);
        // ●beforeの処理・終了

        $response = $next($request);

        // ●after処理・開始
        $content = $response->content();
        $content .= '<style>
                                 body { background-color:#eef; }
                                 p { font-size:18px; }
                                 li { color: red; font-weight:bold;}
                    </style>';
        $response->setContent($content);
        // ●after処理・処理
        return $response;
    }
}
