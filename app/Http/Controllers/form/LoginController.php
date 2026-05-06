<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function loginForm() 
{ 
    // Pakai satu view yang sama untuk Admin & Customer
    return view('form.v_login.login', [ 
        'judul' => 'Login Burger Queen', 
    ]); 
} 

    public function authenticate(Request $request) // Nama fungsi buat jadi lebih umum
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // Cek status aktif (0 = belum aktif, 1 = aktif)
            if (Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('error', 'Akun Anda belum aktif, silakan hubungi admin.');
            }

            $request->session()->regenerate();
            $user = Auth::user();

            // REDIRECT BERDASARKAN ROLE
            // Jika SuperAdmin(0), Admin(1), Staff(2), atau Manager(3) -> ke Backend
            if (in_array($user->role, ['0', '1', '2', '3'])) {
                return redirect()->intended(route('v1.backend.beranda.index'));
            } 
            
            // Jika Customer(4) -> ke Frontend
            if ($user->role == '4') {
                return redirect()->intended(route('v1.frontend.beranda.index'));
            }

            return redirect('/'); // Default jika role tidak dikenal
        }

        return back()->with('error', 'Login Gagal, periksa email dan password Anda.');
    }

    public function logoutForm()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        return redirect(route('v1.form.login'));
    }
}
