<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();
        $totalMenuItems = MenuItem::count();
        $totalRevenues = Order::where('status', 'completed')->sum('total');
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'customer')->count();

        return view('admin.index', compact(
            'user', 'totalMenuItems', 'totalRevenues', 'totalOrders', 'totalCustomers'
        ));
    }

    public function fetchStats()
    {
    
        $totalMenuItems = MenuItem::count();
        $totalRevenues = Order::where('status', 'completed')->sum('total');
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'customer')->count();

        return response()->json([
            'totalRevenues' => $totalRevenues,
            'totalOrders' => $totalOrders,
            'totalMenuItems' => $totalMenuItems,
            'totalCustomers' => $totalCustomers,
        ]);
    }

  
}
