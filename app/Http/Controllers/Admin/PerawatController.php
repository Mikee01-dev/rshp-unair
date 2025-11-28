<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Models\User;

class PerawatController extends Controller
{
    public function index()
    {
        $perawats = Perawat::all();
        return view('admin.perawat.index', compact('perawats'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('nama_role', 'perawat');
        })->get();

        return view('admin.perawat.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'jenis_kelamin' => 'nullable|string|max:1',
            'pendidikan' => 'nullable|string|max:100',
            'id_user' => 'nullable|integer|exists:user,iduser'
        ]);

        Perawat::create($request->all());

        return redirect()->route('perawat.index')->with('success', 'Perawat added successfully.');
    }

    public function edit($id)
    {
        $perawat = Perawat::findOrFail($id);
        return view('admin.perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        $perawat = Perawat::findOrFail($id);

        $request->validate([
            'alamat' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:45',
            'jenis_kelamin' => 'nullable|string|max:1',
            'pendidikan' => 'nullable|string|max:100',
            'id_user' => 'nullable|integer|exists:user,iduser'
        ]);

        $perawat->update($request->all());

        return redirect()->route('perawat.index')->with('success', 'Perawat updated successfully.');
    }

    public function destroy($id)
    {
        $perawat = Perawat::findOrFail($id);
        $perawat->delete();

        return redirect()->route('perawat.index')->with('success', 'Perawat deleted successfully.');
    }
}
