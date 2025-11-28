<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use App\Models\Pet;
use App\Models\RoleUser; // Untuk ambil data Dokter
use App\Models\TemuDokter;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;

class RekamMedisController extends Controller
{
    // 1. DAFTAR REKAM MEDIS
    public function index()
    {
        // Ambil data rekam medis + relasi ke pasien & dokter
        // Urutkan dari yang terbaru (ID terbesar)
        $riwayat = RekamMedis::with(['pet.pemilik.user', 'dokter.user'])
                    ->orderBy('idrekam_medis', 'desc')
                    ->get();

        return view('admin.rekam-medis.index', compact('riwayat'));
    }

    // 2. FORM TAMBAH HEADER
    public function create()
    {
        // Admin butuh data Pet dan Dokter untuk dropdown
        $pets = Pet::with('pemilik.user')->get();
        $dokters = RoleUser::where('idrole', 2)->with('user')->get(); // ID Role 2 = Dokter

        return view('admin.rekam-medis.create', compact('pets', 'dokters'));
    }

    // 3. SIMPAN HEADER
    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required',
            'dokter_pemeriksa' => 'required',
            'diagnosa' => 'required',
            // 'idreservasi_dokter' opsional, admin bisa input manual tanpa reservasi
        ]);

        // Simpan Data Header
        RekamMedis::create([
            'idpet' => $request->idpet,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'created_at' => now(), // Waktu pemeriksaan
        ]);

        return redirect()->route('rekam-medis.index')->with('success', 'Header Rekam Medis berhasil dibuat. Silakan input detail obat di menu Detail.');
    }

    // 4. FORM EDIT HEADER
    public function edit($id)
    {
        $rm = RekamMedis::findOrFail($id);
        $pets = Pet::with('pemilik.user')->get();
        $dokters = RoleUser::where('idrole', 2)->with('user')->get();

        return view('admin.rekam-medis.edit', compact('rm', 'pets', 'dokters'));
    }

    // 5. UPDATE HEADER
    public function update(Request $request, $id)
    {
        $rm = RekamMedis::findOrFail($id);

        $request->validate([
            'idpet' => 'required',
            'dokter_pemeriksa' => 'required',
            'diagnosa' => 'required',
        ]);

        $rm->update([
            'idpet' => $request->idpet,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('rekam-medis.index')->with('success', 'Data Diagnosa diperbarui');
    }

    // 6. HAPUS
    public function destroy($id)
    {
        // Hapus header (otomatis detailnya harusnya hilang kalau ada cascade, kalau tidak harus manual)
        // Kita asumsi hapus header saja dulu
        RekamMedis::findOrFail($id)->delete();
        return redirect()->route('rekam-medis.index')->with('success', 'Data Rekam Medis dihapus');
    }

    // 7. SHOW (Nanti ini jadi tempat masuk ke CRUD Detail)
    public function show($id)
    {
        $rm = RekamMedis::with(['details.tindakan', 'pet', 'dokter.user'])->findOrFail($id);
        // Kita butuh daftar tindakan untuk dropdown tambah detail
        $tindakan = KodeTindakanTerapi::all(); 
        
        return view('admin.rekam-medis.show', compact('rm', 'tindakan'));
    }
}