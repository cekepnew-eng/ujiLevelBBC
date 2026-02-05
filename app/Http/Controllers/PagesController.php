<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function menu()
    {
        $menuItems = MenuItem::active()->get();
        $recommendedItems = MenuItem::active()->recommended()->get();
        $testimonials = Testimonial::approved()->latest()->take(6)->get();
        $branches = Branch::all();
        
        return view('home', compact('menuItems', 'recommendedItems', 'testimonials', 'branches'));
    }

    public function locations()
    {
        $branches = Branch::all();
        return view('locations', compact('branches'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::approved()->get();
        return view('testimonials', compact('testimonials'));
    }

    public function packageDetail($type)
    {
        $packages = [
            'a' => [
                'name' => 'Paket A',
                'price' => 1000000,
                'original_price' => 1200000,
                'discount' => 17,
                'description' => 'Pilihan hemat untuk acara keluarga dengan menu lengkap',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'features' => [
                    'Bakso Urat Special',
                    'Mie Ayam Kampung',
                    'Es Teh Manis',
                    'Sambal & Kerupuk',
                    'Alat Makan Lengkap'
                ],
                'portions' => '50 Porsi'
            ],
            'b' => [
                'name' => 'Paket B',
                'price' => 1200000,
                'original_price' => 1500000,
                'discount' => 20,
                'description' => 'Paket lengkap untuk acara spesial dengan menu premium',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'features' => [
                    'Bakso Tulang & Sum-sum',
                    'Mie Ayam Special',
                    'Es Campur',
                    'Sambal Ikan & Kerupuk Udang',
                    'Alat Makan Premium'
                ],
                'portions' => '75 Porsi'
            ],
            'c' => [
                'name' => 'Paket C',
                'price' => 1500000,
                'original_price' => 2000000,
                'discount' => 25,
                'description' => 'Paket premium untuk acara besar dengan menu komplit',
                'image' => 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg',
                'features' => [
                    'Bakso Komplit Premium',
                    'Mie Ayam + Kwetiau Goreng',
                    'Es Teh & Jus Buah',
                    'Sambal Premium & Krupuk Komplit',
                    'Alat Makan & Dekorasi Meja'
                ],
                'portions' => '100 Porsi'
            ]
        ];

        if (!isset($packages[$type])) {
            abort(404);
        }

        $package = $packages[$type];
        $branches = Branch::all();
        
        return view('package-detail', compact('package', 'branches'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Prepare email data
            $emailData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
                'date' => now()->format('d F Y H:i'),
            ];

            // Send email to cekepnew@gmail.com
            \Mail::send('emails.contact', $emailData, function($message) use ($validated) {
                $message->to('cekepnew@gmail.com')
                        ->subject('Pesan Baru dari Kontak Bakso Bunderan Ciomas')
                        ->from($validated['email'], $validated['name']);
            });

            return redirect()->back()->with('contact_success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return redirect()->back()->with('contact_error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi atau hubungi kami langsung.');
        }
    }

    public function filterMenu(Request $request)
    {
        $category = $request->get('category', 'all');
        
        if ($category === 'all') {
            $menuItems = MenuItem::active()->get();
        } else {
            $menuItems = MenuItem::active()->where('category', $category)->get();
        }
        
        $html = '';
        foreach ($menuItems as $item) {
            $html .= '
            <div class="menu-item" data-category="' . $item->category . '">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="flex gap-6 p-8">
                        <img src="' . ($item->image_path ? asset('storage/' . $item->image_path) : 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg') . '" 
                             class="w-40 h-40 object-cover rounded-lg" alt="' . $item->name . '">
                        <div class="flex-1">
                            <h4 class="text-xl font-bold mb-3">' . $item->name . '</h4>
                            <p class="text-base text-gray-600 mb-3">' . $item->description . '</p>
                            <div class="flex justify-between items-center">
                                <!-- Delivery Apps -->
                                <div class="flex gap-2">
                                    <a href="https://shopee.co.id/food" target="_blank" 
                                       class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center hover:bg-orange-600 transition">
                                        <i class="fas fa-shopping-bag text-white text-sm"></i>
                                    </a>
                                    <a href="https://food.grab.com/id/id/" target="_blank" 
                                       class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center hover:bg-green-600 transition">
                                        <i class="fas fa-motorcycle text-white text-sm"></i>
                                    </a>
                                    <a href="https://wa.me/6281234567890" target="_blank" 
                                       class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center hover:bg-green-700 transition">
                                        <i class="fab fa-whatsapp text-white text-sm"></i>
                                    </a>
                                </div>
                                <button onclick="bukaModalOrder(\'' . addslashes($item->name) . '\')" 
                                        class="bg-red-600 text-white px-5 py-2 rounded font-semibold hover:bg-red-700">
                                    PESAN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
        
        return response()->json(['html' => $html]);
    }
}