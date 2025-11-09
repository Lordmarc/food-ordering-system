<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    
    public function index() 
    {
        $user = auth()->user();
        
        $email = $user->email;
        list($name, $domain) = explode('@', $email);
        $mask = substr($name, 0, 2) . str_repeat('*', strlen($name) - 2) . '@' . $domain;
        return view('customer.partials.profile', compact('user', 'mask'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|min:4|max:255',
            'gender' => 'nullable|string|in:Male,Female'
        ]);

        $user->update($validated);
        
        return redirect()->route('customer.profile.update')->with('success', 'Updated Successfully');
    }
}
