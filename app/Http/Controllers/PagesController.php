<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\Branch;

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
}