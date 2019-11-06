<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Closure;

class Dev
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment(PROD)) {
            return response([
                'code' => 0,
                'msg' => 'Forbidden',
                'data' => [],
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
