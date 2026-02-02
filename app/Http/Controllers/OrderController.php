<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $orders = Order::latest()->paginate(20);
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        
        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    public function show(Order $order)
    {
        $order->order_items = json_decode($order->order_items, true);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);
        
        $order->update($validated);
        
        // Kirim notifikasi status perubahan
        
        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        
        return back()->with('success', 'Pesanan berhasil dihapus.');
    }

    public function export(Request $request)
    {
        // Logika export ke Excel/PDF
    }
}