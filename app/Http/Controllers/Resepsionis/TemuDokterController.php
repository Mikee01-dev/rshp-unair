<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\Pet;
use Illuminate\Http\Request;

class TemuDokterController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        
        $antrian = TemuDokter::with(['pet.pemilik.user', 'pet.ras'])
                    ->whereDate('waktu_daftar', $tanggal)
                    ->orderBy('idreservasi_dokter', 'desc')
                    ->get();

        return view('resepsionis.temu-dokter.index', compact('antrian', 'tanggal'));
    }

    public function create()
    {
        $pets = Pet::with('pemilik.user')->get();
        return view('resepsionis.temu-dokter.create', compact('pets'));
    }

    public function store(Request $request)
    {
        $request->validate(['idpet' => 'required', 'waktu_daftar' => 'required']);

        // Auto Number
        $tgl = date('Y-m-d', strtotime($request->waktu_daftar));
        $last = TemuDokter::whereDate('waktu_daftar', $tgl)->max('no_urut');
        $no_urut = $last ? $last + 1 : 1;

        TemuDokter::create([
            'idpet' => $request->idpet,
            'waktu_daftar' => $request->waktu_daftar,
            'no_urut' => $no_urut,
            'status' => 'B'
        ]);

        return redirect()->route('resepsionis.temu-dokter.index')->with('success', 'Jadwal berhasil dibuat');
    }

    public function edit($id)
    {
        $temu = TemuDokter::findOrFail($id);
        $pets = Pet::with('pemilik.user')->get();
        return view('resepsionis.temu-dokter.edit', compact('temu', 'pets'));
    }

    public function update(Request $request, $id)
    {
        $temu = TemuDokter::findOrFail($id);
        $temu->update($request->all());
        return redirect()->route('resepsionis.temu-dokter.index')->with('success', 'Jadwal diupdate');
    }

    // Fitur Cepat Resepsionis (Konfirmasi Kedatangan / Batal)
    public function updateStatus(Request $request, $id)
    {
        TemuDokter::where('idreservasi_dokter', $id)->update(['status' => $request->status]);
        return back()->with('success', 'Status diubah');
    }

    public function destroy($id)
    {
        TemuDokter::findOrFail($id)->delete();
        return back()->with('success', 'Jadwal dihapus');
    }
}