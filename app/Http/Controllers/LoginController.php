<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username atau password salah.');
        }

        $passwordInput = $request->password;
        $storedPassword = $user->password;

        // Mendukung password lama berbentuk MD5
        $isLegacyMd5 = strlen($storedPassword) === 32
            && ctype_xdigit($storedPassword);

        if ($isLegacyMd5) {
            $passwordValid = md5($passwordInput) === $storedPassword;

            // Ubah password MD5 menjadi hash Laravel setelah login berhasil
            if ($passwordValid) {
                $user->password = Hash::make($passwordInput);
                $user->save();
            }
        } else {
            $passwordValid = Hash::check($passwordInput, $storedPassword);
        }

        if (!$passwordValid) {
            return back()->with('error', 'Username atau password salah.');
        }

        $request->session()->regenerate();

        // Simpan identitas user ke session
        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'nama_lengkap' => $user->nama_lengkap,
            'role' => $user->role,
        ]);

        // Arahkan ke dashboard sesuai role
        if ($user->role === 'operator_desa') {
            return redirect('/dashboard/operator-desa');
        }

        if ($user->role === 'admin_Kecamatan') {
            return redirect('/dashboard/admin-kecamatan');
        }

        if ($user->role === 'bagian_kesra') {
            return redirect('/dashboard/bagian-kesra');
        }

        session()->flush();

        return back()->with('error', 'Role akun tidak dikenali.');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}