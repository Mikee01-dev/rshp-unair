<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('admin.kode-tindakan-terapi.index', compact('kodeTindakanTerapi'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ]);

        KodeTindakanTerapi::create([
            'kode' => strtoupper($request->kode),
            'deskripsi_tindakan_terapi' => ucfirst($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('kode-tindakan-terapi.index')
                         ->with('success', 'Kode Tindakan Terapi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.edit', compact('kodeTindakanTerapi', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ]);

        $kodeTindakanTerapi = KodeTindakanTerapi::findOrFail($id);
        $kodeTindakanTerapi->update([
            'kode' => strtoupper($request->kode),
            'deskripsi_tindakan_terapi' => ucfirst($request->deskripsi_tindakan_terapi),
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()->route('kode-tindakan-terapi.index')
                         ->with('success', 'Kode Tindakan Terapi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kodeTindakanTerapi = KodeTindakanTerapi::findOrFail($id);
        $kodeTindakanTerapi->delete();

        return redirect()->route('kode-tindakan-terapi.index')
                         ->with('success', 'Kode Tindakan Terapi berhasil dihapus.');
    }

    public function formatKodeTindakanTerapi($kode)
    {
        return strtoupper($kode);
    }
}
