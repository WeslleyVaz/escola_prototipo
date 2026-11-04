<?php

namespace App\Http\Middleware;

use App\Models\GestaoToken;
use carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginGestaoApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (request()->has('token_gestao') && $request->has('gestao_id')) {
            $token = GestaoToken::where('gestao_id', $request->gestao_id)
                ->where('token_gestao', $request->token_gestao)
                ->where('valido_ate', '>', Carbon::now())
                ->first();

            if ($token) {
                return response()->json(['message' => 'Token inválido ou expirado!', 'erro' => 's'], 200);
            }

            return $next($request);

        } else {
            return response()->json(['message' => 'Token não fornecido!', 'erro' => 's'], 200);
        }

    }
}
