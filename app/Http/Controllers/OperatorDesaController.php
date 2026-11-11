<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class OperatorDesaController extends Controller
{
    // READ: Menampilkan operator di kecamatan admin yang login
    public function index()
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $operator = User::where('role', 'operator_desa')
            ->whereHas('desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->with('desa')
            ->orderBy('nama_lengkap')
            ->get();

        return view('dashboard.operator_desa.index', compact('user', 'operator'));
    }

    // CREATE: Menampilkan form tambah operator
    public function create()
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $desa = Desa::where('kecamatan_id', $user->kecamatan_id)
            ->orderBy('nama_desa')
            ->get();

        return view('dashboard.operator_desa.create', compact('user', 'desa'));
    }

    // CREATE: Menyimpan akun operator baru
    public function store(Request $request)
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:6',
            'desa_id' => [
                'required',
                Rule::exists('desa', 'id')->where(function ($query) use ($user) {
                    $query->where('kecamatan_id', $user->kecamatan_id);
                }),
            ],
        ]);

        // Satu desa hanya boleh memiliki satu akun operator
        $sudahAda = User::where('role', 'operator_desa')
            ->where('desa_id', $request->desa_id)
            ->exists();

        if ($sudahAda) {
            return back()->withInput()->with('error', 'Desa tersebut sudah memiliki akun Operator Desa.');
        }

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'operator_desa',
            'desa_id' => $request->desa_id,
            'kecamatan_id' => null,
        ]);

        return redirect()->route('admin-kecamatan.operator.index')
            ->with('success', 'Akun Operator Desa berhasil ditambahkan.');
    }

    // UPDATE: Menampilkan form edit operator
    public function edit($id)
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $operator = User::where('role', 'operator_desa')
            ->whereHas('desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->findOrFail($id);

        $desa = Desa::where('kecamatan_id', $user->kecamatan_id)
            ->orderBy('nama_desa')
            ->get();

        return view('dashboard.operator_desa.edit', compact('user', 'operator', 'desa'));
    }

    // UPDATE: Menyimpan perubahan operator
    public function update(Request $request, $id)
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $operator = User::where('role', 'operator_desa')
            ->whereHas('desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($operator->id),
            ],
            'password' => 'nullable|string|min:6',
            'desa_id' => [
                'required',
                Rule::exists('desa', 'id')->where(function ($query) use ($user) {
                    $query->where('kecamatan_id', $user->kecamatan_id);
                }),
            ],
        ]);

        // Pastikan desa tujuan belum memiliki operator lain
        $sudahAda = User::where('role', 'operator_desa')
            ->where('desa_id', $request->desa_id)
            ->where('id', '!=', $operator->id)
            ->exists();

        if ($sudahAda) {
            return back()->withInput()->with('error', 'Desa tersebut sudah memiliki akun Operator Desa lain.');
        }

        $operator->nama_lengkap = $request->nama_lengkap;
        $operator->username = $request->username;
        $operator->desa_id = $request->desa_id;

        if ($request->filled('password')) {
            $operator->password = Hash::make($request->password);
        }

        $operator->save();

        return redirect()->route('admin-kecamatan.operator.index')
            ->with('success', 'Data Operator Desa berhasil diperbarui.');
    }

    // DELETE: Menghapus akun operator
    public function destroy($id)
    {
        $user = User::findOrFail(session('user_id'));

        abort_unless($user->kecamatan_id, 403, 'Akun admin belum terhubung dengan kecamatan.');

        $operator = User::where('role', 'operator_desa')
            ->whereHas('desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->findOrFail($id);

        $operator->delete();

        return redirect()->route('admin-kecamatan.operator.index')
            ->with('success', 'Akun Operator Desa berhasil dihapus.');
    }
}
