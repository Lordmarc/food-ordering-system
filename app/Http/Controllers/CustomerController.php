<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index ()
    {
        $user = Auth()->user();
        return view ('customer.index', compact('user'));
    }
}
