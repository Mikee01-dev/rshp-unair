<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('user')->get();
        return view('admin.dokter.index', compact('dokters'));
    }
// Add import for User model

    public function create()
    {
        // Get users with role 'dokter'
        $users = User::whereHas('roles', function ($query) {
            $query->where('nama_role', 'dokter');
        })->get();

        return view('admin.dokter.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'bidang_dokter' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string|max:1',
            'id_user' => 'nullable|integer|exists:user,iduser'
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter added successfully.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'bidang_dokter' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string|max:1',
            'id_user' => 'nullable|integer|exists:user,iduser'
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter updated successfully.');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter deleted successfully.');
    }
}
