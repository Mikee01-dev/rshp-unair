<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Tampilkan semua role
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Form tambah role
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Simpan role baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role',
        ]);

        Role::create([
            'nama_role' => ucwords(strtolower($request->nama_role)),
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    /**
     * Form edit role
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update data role
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100|unique:role,nama_role,' . $id . ',idrole',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'nama_role' => ucwords(strtolower($request->nama_role)),
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Hapus role
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }
}
