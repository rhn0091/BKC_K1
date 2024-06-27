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
                  ->orWhere('spesialis', 'LIKE', "%{$search}%");
            });
        }

        // Jika ada filter spesialis, tambahkan ke query
        if ($request->has('spesialis') && $request->input('spesialis') != '') {
            $query->where('spesialis', $request->input('spesialis'));
        }

        // Ambil hasil pencarian dan filter
        $konselors = $query->get();

        // Ambil semua spesialis untuk dropdown filter
        $spesialisasis = User::where('role', 'konselor')
                            ->select('spesialis')
                            ->distinct()
                            ->pluck('spesialis');

        // Mengirim data konselor dan spesialis ke view
        return view('dashboard', ['konselors' => $konselors, 'spesialisasis' => $spesialisasis]);
    }
}
