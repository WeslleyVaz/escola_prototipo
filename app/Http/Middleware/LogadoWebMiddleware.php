<?php

namespace App\Http\Middleware;

use App\Models\inspetoras;
use App\Models\InspetorasToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->cookie('inspetora_token') && $request->cookie('inspetoras_id')) {
            $inspetoras_id = $request->cookie('inspetoras_id');
            $token = $request->cookie('inspetora_token');
            $token_inspetora = InspetorasToken::where('inspetoras_id', $inspetoras_id)
                ->where('token_inspetora', $token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if ($token_inspetora) {
                $inspetoras = inspetoras::find($inspetoras_id);
                $request->inspetoras = $inspetoras;

                return $next($request);

            } else {
                Cookie::forget('inspetora_token');
                Cookie::forget('inspetoras_id');

                return redirect()->route('login-inspetoras');
            }

        } else {
            Cookie::forget('inspetora_token');
            Cookie::forget('inspetoras_id');

            return redirect()->route('login-inspetoras');
        }

    }
}
