<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showSignIn ()
    {
        return view('auth.login');
    }

    public function showSignUp ()
    {
        return view('auth.register');
    }

    public function register (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('customer.index')->with('success', 'Account created successfully!');
    }

    public function login (Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();

            $user = auth()->user();

            if( $user->role === 'admin')
            {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
            }

            if( $user->role === 'customer')
            {
                return redirect()->route('customer.index')->with('success', 'Welcome, Customer!');
            }

            return redirect()->route('user.index')->with('success', 'Login successfully!');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorrect credentials'
        ]);
    }

    public function logout (Request $request) 
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.signin');
    }
}
