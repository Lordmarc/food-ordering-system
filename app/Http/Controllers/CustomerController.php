<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuItem;

class CustomerController extends Controller
{
    
    public function index ()
    {
        $user = Auth()->user();
        $categories = Category::all();
        $menuItems = MenuItem::all();


        return view ('customer.index', compact('user', 'categories', 'menuItems'));
    }
}
