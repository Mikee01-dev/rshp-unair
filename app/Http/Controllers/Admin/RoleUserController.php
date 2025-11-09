<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    /**
     * Menampilkan semua user dan rolenya.
     */
    public function index()
    {
        $roleUser = RoleUser::with('user', 'role')->get();
        return view('admin.user-role.index', compact('roleUser'));
    }

    /**
     * Form tambah user baru dengan role.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user-role.create', compact('roles'));
    }

    /**
     * Simpan user baru + role ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6',
            'idrole' => 'required|exists:role,idrole',
        ]);

        try {
            // 1️⃣ Buat user baru
            $user = User::create([
                'nama' => ucwords(strtolower($request->nama)),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // 2️⃣ Hubungkan ke role_user
            RoleUser::create([
                'iduser' => $user->iduser,
                'idrole' => $request->idrole,
            ]);

            return redirect()->route('user-role.index')->with('success', 'User baru dengan role berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }

    public function edit($iduser)
{
    $user = User::findOrFail($iduser);
    $roleUser = RoleUser::where('iduser', $iduser)->first();
    $roles = Role::all();

    return view('admin.user-role.edit', compact('user', 'roleUser', 'roles'));
}

    public function update(Request $request, $iduser)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $iduser . ',iduser',
            'password' => 'nullable|string|min:6',
            'idrole' => 'required|exists:role,idrole',
        ]);

        try {
            // Update user
            $user = User::findOrFail($iduser);
            $user->update([
                'nama' => ucwords(strtolower($request->nama)),
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);

            // Update role_user
            RoleUser::updateOrCreate(
                ['iduser' => $iduser],
                ['idrole' => $request->idrole]
            );

            return redirect()->route('user-role.index')->with('success', 'Data user dan role berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }
    
    /**
     * Hapus user + role terkait.
     */
    public function destroy($iduser)
    {
        try {
            // Hapus relasi role_user dulu agar tidak error FK
            RoleUser::where('iduser', $iduser)->delete();

            // Hapus user
            User::where('iduser', $iduser)->delete();

            return redirect()->route('user-role.index')->with('success', 'User dan role berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}
