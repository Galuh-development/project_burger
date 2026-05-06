<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; // Buat enkripsi password

class RegisterController extends Controller
{
    protected $table = 'user';

    public function registerForm()
    {
        return view('form.v_register.register', [
            'judul' => 'Daftar Akun Burger Queen'
        ]);
    }

    public function registerProcess(Request $request)
    {
        // 1. Validasi Dasar
    $validatedData = $request->validate([
        'nama' => 'required|max:50',
        'email' => 'required|email|unique:user,email', // Cek lagi nama tabel lo!
        'hp' => 'required|min:10|max:15',
        'password' => 'required|min:8',
    ]);

    // 2. Cek Kombinasi Password 
    $password = $request->input('password');
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/';

    if (preg_match($pattern, $password)) {
        // Jika OK, baru di-Hash
        $validatedData['password'] = Hash::make($password);
        $validatedData['role'] = '4'; // Otomatis jadi Customer
        $validatedData['status'] = '1'; // Otomatis Aktif

        // Simpan ke tabel 'user' (Sesuaikan nama model lo)
        User::create($validatedData);

        return redirect()->route('v1.form.login')->with('success', 'Registrasi berhasil! Silahkan login.');
    } else {
        return redirect()->back()->withErrors([
            'password' => 'Password harus kombinasi huruf besar, kecil, angka, dan simbol.'
        ])->withInput(); // withInput biar email yg diketik gak ilang
    }
            
        // Simpan data ke tabel users
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Di-hash biar aman
            'hp' => $request->hp,
            'role' => '4', // Role customer sesuai rencana lo
            'status' => 1,
        ]);

        return redirect()->route('v1.form.login')->with('success', 'Akun berhasil dibuat, silahkan login!');
    }
}
