<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KonselorController extends Controller
{
    public function dashboard()
    {
        // Logika untuk menampilkan dashboard konselor
        return view('konselor');
    }

    public function profil($id)
    {
        $konselor = User::findOrFail($id);
        return view('konselor.profil', compact('konselor'));
    }
}
