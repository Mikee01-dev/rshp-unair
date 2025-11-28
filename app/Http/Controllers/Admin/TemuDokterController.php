<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pet;
use Illuminate\Http\Request;

class TemuDokterController extends Controller
{
    // 1. READ (Index) - Urut ID Terbesar (Terbaru)
    public function index()
    {
        $antrian = TemuDokter::with(['pet.pemilik.user', 'pet.ras'])
                    ->orderBy('idreservasi_dokter', 'desc') // Sesuai request: ID Terbaru
                    ->get();

        return view('admin.temu-dokter.index', compact('antrian'));
    }

    // 2. CREATE (Form)
    public function create()
    {
        // Ambil data hewan untuk dropdown
        $pets = Pet::with(['pemilik.user', 'ras'])->get();
        return view('admin.temu-dokter.create', compact('pets'));
    }

    // 3. STORE (Simpan)
    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required',
            'waktu_daftar' => 'required|date',
            'status' => 'required',
        ]);

        // Opsional: Hitung No Urut Harian (biar database tetap rapi meski tampilan pakai ID)
        $tgl = date('Y-m-d', strtotime($request->waktu_daftar));
        $last = TemuDokter::whereDate('waktu_daftar', $tgl)->max('no_urut');
        $no_urut = $last ? $last + 1 : 1;

        TemuDokter::create([
            'idpet' => $request->idpet,
            'waktu_daftar' => $request->waktu_daftar,
            'status' => $request->status,
            'no_urut' => $no_urut, // Tetap diisi di background
        ]);

        return redirect()->route('temu-dokter.index')->with('success', 'Data temu dokter berhasil ditambahkan');
    }

    // 4. EDIT (Form)
    public function edit($id)
    {
        $temu = TemuDokter::findOrFail($id);
        $pets = Pet::with(['pemilik.user', 'ras'])->get();
        return view('admin.temu-dokter.edit', compact('temu', 'pets'));
    }

    // 5. UPDATE (Simpan Perubahan)
    public function update(Request $request, $id)
    {
        $request->validate([
            'idpet' => 'required',
            'waktu_daftar' => 'required|date',
            'status' => 'required',
        ]);

        $temu = TemuDokter::findOrFail($id);
        $temu->update([
            'idpet' => $request->idpet,
            'waktu_daftar' => $request->waktu_daftar,
            'status' => $request->status,
        ]);

        return redirect()->route('temu-dokter.index')->with('success', 'Data berhasil diperbarui');
    }

    // 6. DELETE (Hapus)
    public function destroy($id)
    {
        TemuDokter::findOrFail($id)->delete();
        return redirect()->route('temu-dokter.index')->with('success', 'Data dihapus');
    }
}