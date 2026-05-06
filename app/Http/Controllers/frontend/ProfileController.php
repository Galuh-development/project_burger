<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('frontend.v_profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('frontend.v_profile.edit', compact('user'));
    }

    public function update(Request $request)
{
    // 1. Cari user yang sedang login
    $user = User::findOrFail(Auth::id());

    // 2. Validasi (Password dibuat 'nullable' biar gak wajib diisi terus)
    $rules = [
        'nama' => 'required|max:50',
        'email' => 'required|email|unique:user,email,' . $user->id,
        'hp' => 'required|min:10|max:15',
        'password' => 'nullable|min:8', 
        'foto' => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
    ];

    $messages = [
        'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
        'foto.max' => 'Ukuran file gambar Maksimal adalah 1024 KB.'
    ];

    $request->validate($rules, $messages);

    // 3. Update data dasar
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->hp = $request->hp;

    // 4. Logika Ganti Password (Hanya jika diisi)
    if ($request->filled('password')) {
        $password = $request->input('password');
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/';

        if (preg_match($pattern, $password)) {
            $user->password = Hash::make($password);
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Password baru harus kombinasi huruf besar, kecil, angka, dan simbol.'
            ])->withInput();
        }
    }

    // 5. Logika Update Foto
    if ($request->hasFile('foto')) {
        if ($user->foto && $user->foto !== 'img-default.jpg') {
            Storage::delete('public/img-user/' . $user->foto);
        }
        
        $file = $request->file('foto');
        $namaFile = time() . '_' . str_replace(' ', '_', $user->nama) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/img-user', $namaFile);
        $user->foto = $namaFile;
    }

    // 6. Simpan perubahan (Update, bukan Create!)
    $user->save();

    return redirect()->route('v1.frontend.profile.index')->with('success', 'Profil berhasil diupdate!');
}
}
