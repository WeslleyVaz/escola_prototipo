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
        if(cookie::has('gestao_id') && Cookie::has('token_gestao')) {
            $gestao_id = Cookie::get('gestao_id');
            $token_gestao = Cookie::get('token_gestao');
            $token_gestao = GestaoToken::where('gestao_id',$gestao_id)
            ->where('token_gestao',$token_gestao)
            ->where('valido_ate','>',Carbon::now())
            ->first();
            if($token_gestao){
                $gestao = Gestao::find($gestao_id);
                $request->gestao = $gestao;

                return $next($request);

            }else{

        Cookie::forget('gestao_token');
        Cookie::forget('token_gestao');
        Cookie::forget('gestao_id');

        return redirect()->route('login-gestao');
        }
    }
}
}