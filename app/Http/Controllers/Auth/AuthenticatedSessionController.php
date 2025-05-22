<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
    public function createAdmin()
    {
        return view('auth.login-admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah user admin (misal berdasarkan kolom "is_admin" atau "role")
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Tambahkan pemeriksaan level admin
            if (Auth::user()->level === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            // Jika bukan admin, logout kembali
            Auth::logout();
            return back()->withErrors([
                'email' => 'Anda tidak memiliki akses sebagai admin.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Kredensial yang Anda berikan salah.',
        ]);
    }
}
