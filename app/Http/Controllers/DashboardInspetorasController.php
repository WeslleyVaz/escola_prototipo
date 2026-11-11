<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardInspetorasController
{
    public function index_inspetora(Request $request)
    {
        $inspetora = $request->inspetoras;

        return view('dashboard-inspetoras')->with('inspetora', $inspetora);
    }

    public function mostar_dashboard(Request $request)
    {
        $inspetora = $request->inspetora;

        return view('dashboard-inspetoras')->with('inspetora', $inspetora);
    }
}
