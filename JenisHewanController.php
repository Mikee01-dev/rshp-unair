<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_hewan,nama_jenis',
        ]);

        JenisHewan::create([
            'nama_jenis' => ucwords(strtolower($request->nama_jenis)),
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('admin.jenis-hewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_hewan,nama_jenis,' . $id . ',idjenis_hewan',
        ]);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update([
            'nama_jenis' => ucwords(strtolower($request->nama_jenis)),
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $jenis = JenisHewan::findOrFail($id);
            $jenis->delete();
            return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Gagal menghapus jenis hewan karena masih terkait dengan data lain.');
        }
    }
}