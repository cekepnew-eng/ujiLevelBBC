<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Hardcoded admin credentials
        if ($credentials['username'] === 'bbcjaya123' && $credentials['password'] === 'bbcjaya123') {
            // Set admin session
            Session::put('admin_user', [
                'username' => 'bbcjaya123',
                'name' => 'Administrator',
                'login_time' => now()
            ]);
            
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Session::forget('admin_user');
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }

    public function dashboard()
    {
        if (!Session::has('admin_user')) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.dashboard-new');
    }
}
