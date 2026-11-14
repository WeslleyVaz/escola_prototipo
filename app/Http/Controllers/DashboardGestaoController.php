<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardGestaoController
{
    public function index_gestao(Request $request)
    {
        $gestao = $request->gestao;

        return view('dashboard-coordenacao')->with('gestao', $gestao);
    }

    public function mostar_dashboard(Request $request)
    {
        $inspetora = $request->inspetora;

        return view('dashboard-inspetoras')->with('inspetora', $inspetora);
    }
}
