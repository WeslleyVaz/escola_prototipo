<?php

namespace App\Http\Middleware;

use App\Models\gestao;
use App\Models\GestaoToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LogadoGestaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('gestao_token') ?? $request->cookie('token_gestao');
        $gestao_id = $request->cookie('gestao_id');

        if ($token && $gestao_id) {
            $tokens_gestao = GestaoToken::where('gestao_id', $gestao_id)
                ->where('valido_ate', '>', Carbon::now())
                ->get();
            $token_gestao = $tokens_gestao->first(function (GestaoToken $token_gestao) use ($token): bool {
                return Hash::check($token, $token_gestao->token_gestao);
            });

            if ($token_gestao) {
                $gestao = gestao::find($gestao_id);

                if ($gestao) {
                    $request->gestao = $gestao;

                    return $next($request);
                }
            }
        }

        Cookie::forget('gestao_token');
        Cookie::forget('token_gestao');
        Cookie::forget('gestao_id');

        return redirect()->route('login-gestao');
    }
}
