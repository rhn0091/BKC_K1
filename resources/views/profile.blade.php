// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->spesialisasi = $request->spesialisasi;

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