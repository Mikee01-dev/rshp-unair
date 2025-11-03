<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RoleUser;
class RoleUserController extends Controller
{
    public function index()
    {
        $roleUser = RoleUser::with('user', 'role')->get();
        return view('admin.user-role.index', compact('roleUser'));
    }

    public function create()
    {
        return view('admin.user-role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:users,iduser',
            'idrole' => 'required|exists:roles,idrole',
        ]);

        RoleUser::create([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Role pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $roleUser = RoleUser::findOrFail($id);
        return view('admin.user-role.edit', compact('roleUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required|exists:users,iduser',
            'idrole' => 'required|exists:roles,idrole',
        ]);

        $roleUser = RoleUser::findOrFail($id);
        $roleUser->update([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
        ]);

        return redirect()->route('admin.user-role.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $roleUser = RoleUser::findOrFail($id);
        $roleUser->delete();

        return redirect()->route('admin.user-role.index')->with('success', 'Role pengguna berhasil dihapus.');
    }

    public function formatRoleUser($roleUser)
    {
        return ucwords(strtolower($roleUser));
    }

}
