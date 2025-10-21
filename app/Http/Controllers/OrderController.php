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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
}
