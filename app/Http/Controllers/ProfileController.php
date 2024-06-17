<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $spesialis = $user->role === 'konselor' ? Spesialis::all() : [];
        return view('profile', compact('user', 'spesialis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|min:2|max:100',
            'email'      => 'required|email|unique:users,email,' . $id . ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()
                    ->withErrors(['old_password' => __('Please enter the correct password')])
                    ->withInput();
            }

            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(storage_path('app/public/photos/' . $user->photo))) {
                Storage::delete('public/photos/' . $user->photo);
            }

            $file = $request->file('photo');
            $fileName = $file->hashName();
            $file->storeAs('public/photos', $fileName);
            $user->photo = $fileName;
        }

        $user->save();

        return back()->with('status', 'Profile updated!');
    }
}
