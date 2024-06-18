<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Jangan lupa untuk mengimpor model User

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil pengguna dengan peran 'konselor'
        $konselors = User::where('role', 'konselor')->get();

        // Mengirim data konselor ke view
        return view('dashboard', ['konselors' => $konselors]);
    }
}
