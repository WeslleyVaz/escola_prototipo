<?php

namespace App\Http\Middleware;

use App\Models\InspetorasToken;
use carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginInspetoraApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (request()->has('token_inspetora') && $request->has('inspetoras_id')) {
            $token = InspetorasToken::where('inspetoras_id', $request->inspetoras_id)
                ->where('token_inspetora', $request->token_inspetora)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if (! $token) {
                return response()->json(['message' => 'Token inválido ou expirado!', 'erro' => 's'], 200);
            }

            return $next($request);
        } else {
            return response()->json(['message' => 'Token não fornecido!', 'erro' => 's'], 200);
        }

    }
}
