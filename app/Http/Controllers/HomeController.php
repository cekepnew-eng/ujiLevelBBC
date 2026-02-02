<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\Branch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::active()->get();
        $testimonials = Testimonial::approved()->latest()->take(6)->get();
        
        // Cek apakah tabel branches ada
        $branches = collect();
        try {
            if (\Schema::hasTable('branches')) {
                $branches = Branch::all();
            }
        } catch (\Exception $e) {
            // Jika error, gunakan data dummy
            $branches = collect([
                (object)[
                    'name' => 'BBC – Bunderan Ciomas',
                    'address' => 'Jl. Raya Ciomas, Bunderan Ciomas, Kabupaten Bogor',
                    'phone' => '(0251) 123-4567',
                    'google_maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d106.76581961476838!3d-6.597564566187789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f4e5c5c5c5%3A0x3b7d7d7d7d7d7d7d!2sBunderan%20Ciomas!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid',
                    'operational_hours' => 'Senin - Minggu, 08:00 - 22:00 WIB',
                    'is_main' => true,
                ],
                (object)[
                    'name' => 'BBC – Cabang Ciomas 2',
                    'address' => 'Jl. Raya Laladon, Ciomas, Kabupaten Bogor',
                    'phone' => '(0251) 234-5678',
                    'google_maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d106.76581961476838!3d-6.597564566187789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f4e5c5c5c5%3A0x3b7d7d7d7d7d7d7d!2sLaladon%20Ciomas!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid',
                    'operational_hours' => 'Senin - Minggu, 09:00 - 21:00 WIB',
                    'is_main' => false,
                ]
            ]);
        }
        
        $categories = [
            'bakso' => $menuItems->where('category', 'bakso')->take(4),
            'mie' => $menuItems->where('category', 'mie')->take(5),
            'minuman' => $menuItems->where('category', 'minuman')->take(5),
            'paket' => $menuItems->where('category', 'paket')->take(4),
        ];
        
        return view('home', compact('menuItems', 'testimonials', 'branches', 'categories'));
    }

    public function filterMenu(Request $request)
    {
        $category = $request->input('category', 'all');
        
        $menuItems = MenuItem::active()
            ->byCategory($category)
            ->get();
            
        return response()->json([
            'html' => view('partials.menu-items', compact('menuItems'))->render()
        ]);
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        $testimonial = Testimonial::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Testimonial berhasil dikirim. Menunggu persetujuan admin.',
            'testimonial' => $testimonial
        ]);
    }
}