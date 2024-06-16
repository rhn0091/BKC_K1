<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->only(['email', 'password']);

        // Manually verify the credentials since passwords are stored in plain text
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);
            if ($user->role == 'konselor') {
                return redirect()->route('konselor.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password']; // Store plain text password
        $user->role = 'user'; // Default role is user
        $user->save();

        return redirect()->route('login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'create']);
    }

    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function authorize($ability, $arguments = [])
    {
        return !Auth::check();
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login.index'); // atau redirect('/login')
    }
    
}
