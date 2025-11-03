<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeOrders = Order::where('status', '!=', 'completed')->get();
        $completedOrders = Order::where('status', 'completed')->get();
        $statuses = Order::getStatuses();

        return view('admin.order.index', compact('activeOrders', 'completedOrders', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = $request->input('cart');
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        foreach($cart as $item){
            OrderItem::create([
                'order_id'     => $order->id,
                'menu_item_id' => $item['id'],
                'quantity'     => $item['quantity'],
                'subtotal'     => $item['price'],
            ]);
        }

        return response()->json(['message' => 'Order placed successfully!']);
    }



    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,preparing,ready,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return response()->json([
            'message' => 'Order status updated successfully!',
        ]);
    }

    // customer order

    public function customerOrder()
    {
        $user = auth()->user();
        $orders = $user->orders()->with('items.menuItem')->orderBy('created_at', 'desc')->get();
        $pendingOrders = $user->orders()->where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $preparingOrders = $user->orders()->where('status', 'preparing')->orderBy('created_at', 'desc')->get();
        $readyOrders = $user->orders()->where('status', 'ready')->orderBy('created_at', 'desc')->get();
        $completedOrders = $user->orders()->where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return view('customer.order.index', compact('orders', 'pendingOrders', 'preparingOrders', 'readyOrders', 'completedOrders'));
    }

    public function fetchOrders()
    {
        $user = auth()->user();
        $orders = $user->orders()
        ->with('items.menuItem')
        ->orderBy('created_at', 'desc')
        ->get();

          return response()->json([
            'orders' => $orders,
            'pendingOrders' => $orders->where('status', 'pending')->values(),
            'preparingOrders' => $orders->where('status', 'preparing')->values(),
            'readyOrders' => $orders->where('status', 'ready')->values(),
            'completedOrders' => $orders->where('status', 'completed')->values(),
        ]);
    }
}
