<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use App\Models\JenisHewan;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with(['ras.jenis', 'pemilik.user'])->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        // 1. Ambil Pemilik BESERTA data User-nya (agar nama muncul)
        $pemiliks = Pemilik::with('user')->get(); 

        // 2. Ambil Master Data Hewan
        $jenis_hewans = JenisHewan::all();
        
        // 3. Ambil SEMUA Ras (Nanti difilter oleh JavaScript di View)
        $ras_hewans = RasHewan::all(); 

        return view('admin.pet.create', compact('pemiliks', 'jenis_hewans', 'ras_hewans'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required',
            'idpemilik' => 'required',
            'idras_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'warna_tanda' => 'required',
            'tanggal_lahir' => 'nullable|date',
        ]);

        // 2. SIMPAN DATA (Cara Aman)
        // Kita sebutkan satu-satu kolomnya supaya 'dummy_jenis' TIDAK IKUT masuk
        Pet::create([
            'nama' => $request->nama,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warna_tanda' => $request->warna_tanda,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('pet.index')->with('success', 'Pasien hewan berhasil didaftarkan');
    }
// 1. Method EDIT (Tampilkan Form)
    public function edit($id)
    {
        // Load data pet dengan relasi ras -> jenis_hewan
        $pet = Pet::with('ras.jenisHewan')->findOrFail($id);
        
        $pemiliks = Pemilik::with('user')->get();
        $jenis_hewans = JenisHewan::all();
        $ras_hewans = RasHewan::all(); // Kirim SEMUA ras untuk filter JS

        return view('admin.pet.edit', compact('pet', 'pemiliks', 'jenis_hewans', 'ras_hewans'));
    }

    // 2. Method UPDATE (Proses Simpan)
    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        
        $request->validate([
            'nama' => 'required',
            'idpemilik' => 'required',
            'idras_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'warna_tanda' => 'required',
        ]);

        // UPDATE MANUAL (Penting! Agar 'dummy_jenis' tidak ikut tersimpan)
        $pet->update([
            'nama' => $request->nama,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warna_tanda' => $request->warna_tanda,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('pet.index')->with('success', 'Data pasien diperbarui');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pet.index')->with('success', 'Data hewan peliharaan berhasil dihapus.');
    }

    public function formatNamaPet($nama)
    {
        return ucwords(strtolower($nama));
    }

}
