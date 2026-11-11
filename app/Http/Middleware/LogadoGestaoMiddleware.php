<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\GestaoToken;
use App\Models\Gestao;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class LogadoGestaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cookie::has('gestao_token') && Cookie::has('gestao_id')) {

            $gestao_id = Cookie::get('gestao_id');
            $token = Cookie::get('gestao_token');

            $token_gestao = GestaoToken::where('gestao_id', $gestao_id)
                ->where('token_gestao', $token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();

            if ($token_gestao) {

                $gestao = Gestao::find($gestao_id);
                $request->gestao = $gestao;

                $gestao = Gestao::where('gestao_id', $gestao_id)->first();

                if ($gestao) {
                    return $next($request);
                } else {
                    Cookie::forget('gestao_token');
                    Cookie::forget('gestao_id');

                    return redirect()->route('login_teste');
                }

            } else {
                Cookie::forget('gestao_token');
                Cookie::forget('gestao_id');

                return redirect()->route('login_teste');
            }

        } else {
            return redirect()->route('login_teste');
        }
    }
}