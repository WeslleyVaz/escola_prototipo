<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class InspetoraLoginController
{
    public function MostrarLogin()
    {
        return view('login_teste');
    }
}
