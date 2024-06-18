<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $query = User::where('role', 'konselor');

        // Jika ada pencarian, tambahkan ke query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('spesialisasi', 'LIKE', "%{$search}%");
            });
        }

        // Jika ada filter spesialisasi, tambahkan ke query
        if ($request->has('spesialisasi') && $request->input('spesialisasi') != '') {
            $query->where('spesialisasi', $request->input('spesialisasi'));
        }

        // Ambil hasil pencarian dan filter
        $konselors = $query->get();

        // Ambil semua spesialisasi untuk dropdown filter
        $spesialisasis = User::where('role', 'konselor')
                            ->select('spesialisasi')
                            ->distinct()
                            ->pluck('spesialisasi');

        // Mengirim data konselor dan spesialisasi ke view
        return view('dashboard', ['konselors' => $konselors, 'spesialisasis' => $spesialisasis]);
    }
}
