<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function dashboard()
    {
        return view('konselor');
    }
}
