<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['is_approved' => true]);
        
        return back()->with('success', 'Testimonial berhasil disetujui.');
    }

    public function reply(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'admin_reply' => 'required|string|max:1000'
        ]);
        
        $testimonial->update([
            'admin_reply' => $validated['admin_reply'],
            'is_approved' => true
        ]);
        
        return back()->with('success', 'Balasan berhasil dikirim.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        
        return back()->with('success', 'Testimonial berhasil dihapus.');
    }
}