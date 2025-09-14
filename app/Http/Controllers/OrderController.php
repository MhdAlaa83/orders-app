<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     * We keep it simple: fetch all orders (newest first) and pass to the view.
     */
    public function index()
    {
        // In real apps you might paginate, but here we keep it simple and educational.
        $orders = Order::orderByDesc('created_at')->get();

        // Pass collection to Blade (resources/views/orders/index.blade.php).
        return view('orders.index', compact('orders'));
    }
}
