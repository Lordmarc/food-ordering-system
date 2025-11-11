<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class ProfileController extends Controller
{
    
    public function index() 
    {
        $user = auth()->user();
        
        $email = $user->email;
        list($name, $domain) = explode('@', $email);
        $mask = substr($name, 0, 2) . str_repeat('*', strlen($name) - 2) . '@' . $domain;
        return view('customer.profile.index', compact('user', 'mask'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|min:4|max:255',
            'gender' => 'nullable|string|in:Male,Female'
        ]);

        $user = auth()->user();
        $user->update($validated);
        
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function address()
    {
        $user = auth()->user();
        $addresses = auth()->user()->addresses()->orderBy('created_at', 'desc')->get();

        return view('customer.address.address', compact('user','addresses'));
    }

    public function createAddress(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'postal_code' => 'required|string',
            'address_name' => 'required|string'
        ]);

        $user = auth()->user();
        $user->addresses()->create($validated);

        return redirect()->route('customer.address')->with('success', 'Added New Address Succesfully!');
    }
}
