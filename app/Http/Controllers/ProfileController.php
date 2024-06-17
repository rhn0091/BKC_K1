<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'old_password' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
            'photo' => 'nullable|image|max:2048',
            'spesialisasi' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->spesialisasi = $request->spesialisasi;

        if ($request->filled('old_password')) {
            if ($request->old_password === $user->password) {
                $user->password = $request->password;
            } else {
                return back()->withErrors(['old_password' => 'The old password is incorrect']);
            }
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('status', 'Profile updated successfully');
    }
}

