<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use App\Models\RekamMedis;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    // 1. DASHBOARD PERAWAT (Lihat Antrian Menunggu)
// Tambahkan method ini:
    public function index(Request $request)
    {
        // Fitur Pencarian Sederhana (berdasarkan nama hewan)
        $query = RekamMedis::with(['pet.pemilik.user', 'dokter.user']);

        if ($request->has('search')) {
            $query->whereHas('pet', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // Urutkan dari yang terbaru
        $riwayat = $query->latest('created_at')->get();

        return view('perawat.rekam-medis.index', compact('riwayat'));
    }

    // 2. FORM TRIAGE (Pemeriksaan Awal)
    public function create($idreservasi)
    {
        $reservasi = TemuDokter::with(['pet.pemilik.user'])->findOrFail($idreservasi);
        
        // Ambil daftar dokter untuk dipilih perawat
        $dokters = RoleUser::where('idrole', 2)->with('user')->get();

        return view('perawat.triage.create', compact('reservasi', 'dokters'));
    }

    // 3. SIMPAN TRIAGE
    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'idpet' => 'required',
            'dokter_pemeriksa' => 'required', // Perawat yang tentukan dokternya
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            
            // A. Simpan Header Rekam Medis (Diagnosa dikosongkan dulu)
            RekamMedis::create([
                'idreservasi_dokter' => $request->idreservasi_dokter,
                'idpet' => $request->idpet,
                'dokter_pemeriksa' => $request->dokter_pemeriksa,
                'anamnesa' => $request->anamnesa,
                'temuan_klinis' => $request->temuan_klinis,
                'diagnosa' => 'Belum diperiksa dokter', // Default value
                'created_at' => now(),
            ]);

            // B. Update Status Antrian jadi 'P' (Progress / Sedang Diperiksa)
            // Agar nama pasien muncul di Dashboard Dokter
            $reservasi = TemuDokter::findOrFail($request->idreservasi_dokter);
            $reservasi->update(['status' => 'P']);
        });

        return redirect()->route('perawat.dashboard')->with('success', 'Data awal pasien berhasil disimpan. Pasien siap diperiksa Dokter.');
    }

    // 4. FORM EDIT (Perbaiki Data Triage)
    public function edit($id)
    {
        // Ambil data rekam medis
        $rm = RekamMedis::with(['pet.pemilik.user', 'pet.ras'])->findOrFail($id);
        
        // Ambil daftar dokter (untuk jaga-jaga kalau mau ganti dokter)
        $dokters = RoleUser::where('idrole', 2)->with('user')->get();

        return view('perawat.triage.edit', compact('rm', 'dokters'));
    }

    // 5. UPDATE DATA TRIAGE
    public function update(Request $request, $id)
    {
        $rm = RekamMedis::findOrFail($id);

        $request->validate([
            'dokter_pemeriksa' => 'required',
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
        ]);

        // Perawat HANYA update bagian Triage
        // Diagnosa dokter TIDAK boleh diubah perawat
        $rm->update([
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
        ]);

        return redirect()->route('perawat.rekam-medis.index')->with('success', 'Data Triage berhasil diperbarui.');
    }

    // ... method create & store triage sebelumnya ...

    public function show($id)
    {
        // Load rekam medis beserta detail obat, dokter, dan pasien
        $rm = RekamMedis::with(['details.tindakan', 'pet.pemilik.user', 'dokter.user'])
              ->findOrFail($id);
              
        return view('perawat.rekam-medis.show', compact('rm'));
    }
}