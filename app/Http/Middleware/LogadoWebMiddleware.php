<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\InspetorasToken;
use App\Models\inspetoras;
use iluminate\Support\Facades\Cookie;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Cookie::has('token') && Cookie::has('inspetora_id')) {
            $token = InspetorasToken::where('inspetora_id', Cookie::get('inspetora_id'));

            if(!$token) {
                return redirect('/login');
            }


        return $next($request);
    }
}
}
