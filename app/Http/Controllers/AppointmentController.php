<?php

// App\Http\Controllers\AppointmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Auth;

class AppointmentController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $role = $user->role;

    if ($role == 'konselor') {
        $appointments = Appointment::with('user', 'konselor')->whereHas('konselor', function($query) use ($user) {
            $query->where('id', $user->id);
        })->get();
    } else {
        $appointments = Appointment::with('user', 'konselor')->where('user_id', $user->id)->get();
    }

    return view('appointments.index', compact('appointments'));
}

    public function create()
    {
        $konselors = User::where('role', 'konselor')->get();
        return view('appointments.create', compact('konselors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'konselor_id' => 'required',
            'appointment_time' => 'required|date'
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'konselor_id' => $request->konselor_id,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending'
        ]);

        return redirect()->route('appointments.index')->with('success', 'Janji berhasil dibuat.');
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return back()->with('success', 'Status janji berhasil diperbarui.');
    }

    
}
