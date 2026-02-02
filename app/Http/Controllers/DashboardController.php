<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\Order;
use App\Models\Branch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_menu' => MenuItem::count(),
            'pending_testimonials' => Testimonial::where('is_approved', false)->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_amount'),
            'branches' => Branch::count()
        ];
        
        $recentOrders = Order::latest()->take(10)->get();
        $pendingTestimonials = Testimonial::where('is_approved', false)->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recentOrders', 'pendingTestimonials'));
    }
}