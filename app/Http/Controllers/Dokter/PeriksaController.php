<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use App\Models\DetailRekamMedis;
use App\Models\KodeTindakanTerapi;
use App\Models\TemuDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    // 1. TAMPILAN HALAMAN PERIKSA
    public function edit($id)
    {
        // $id adalah idrekam_medis (yang dibuat perawat)
        $rm = RekamMedis::with(['details.tindakan', 'pet.pemilik.user', 'pet.ras'])->findOrFail($id);
        
        // Ambil Master Data Obat/Tindakan untuk dropdown
        $tindakan = KodeTindakanTerapi::all();

        return view('dokter.periksa.edit', compact('rm', 'tindakan'));
    }

    // 2. UPDATE DIAGNOSA (HEADER)
    public function updateDiagnosa(Request $request, $id)
    {
        $rm = RekamMedis::findOrFail($id);
        
        $request->validate([
            'diagnosa' => 'required|string',
        ]);

        $rm->update([
            'diagnosa' => $request->diagnosa,
            'anamnesa' => $request->anamnesa, // Dokter boleh revisi anamnesa jika perlu
        ]);

        return back()->with('success', 'Diagnosa berhasil disimpan.');
    }

    // 3. TAMBAH ITEM OBAT/TINDAKAN (DETAIL)
    public function storeDetail(Request $request, $id)
    {
        $request->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string'
        ]);

        DetailRekamMedis::create([
            'idrekam_medis' => $id, // ID Header
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail ?? '-'
        ]);

        return back()->with('success', 'Tindakan/Obat ditambahkan.');
    }

    // 4. HAPUS ITEM OBAT (DETAIL)
    public function destroyDetail($id_detail)
    {
        $detail = DetailRekamMedis::findOrFail($id_detail);
        $detail->delete();
        
        return back()->with('success', 'Item berhasil dihapus.');
    }

    // ... method sebelumnya ...

    // 6. FORM EDIT ITEM OBAT (Khusus satu baris)
    public function editDetail($id_detail)
    {
        $detail = DetailRekamMedis::findOrFail($id_detail);
        $tindakan = KodeTindakanTerapi::all(); // Untuk dropdown ganti obat

        return view('dokter.periksa.edit_detail', compact('detail', 'tindakan'));
    }

    // 7. UPDATE ITEM OBAT
    public function updateDetail(Request $request, $id_detail)
    {
        $detail = DetailRekamMedis::findOrFail($id_detail);

        $request->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string'
        ]);

        $detail->update([
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail
        ]);

        // Kembali ke halaman pemeriksaan utama (Header)
        return redirect()->route('dokter.periksa.edit', $detail->idrekam_medis)
                         ->with('success', 'Item obat berhasil diperbarui.');
    }

    // 5. SELESAI PERIKSA (FINALISASI)
    public function selesai($id)
    {
        $rm = RekamMedis::findOrFail($id);
        
        // Validasi: Diagnosa wajib diisi sebelum selesai
        if (empty($rm->diagnosa) || $rm->diagnosa == 'Belum ada diagnosa' || $rm->diagnosa == 'Belum diperiksa dokter') {
            return back()->with('error', 'Mohon isi Diagnosa Utama terlebih dahulu!');
        }

        // Update Status Antrian di tabel temu_dokter menjadi 'S' (Selesai)
        // Agar hilang dari dashboard dokter
        if ($rm->idreservasi_dokter) {
            TemuDokter::where('idreservasi_dokter', $rm->idreservasi_dokter)
                      ->update(['status' => 'S']);
        }

        return redirect()->route('dokter.dashboard')->with('success', 'Pemeriksaan selesai. Pasien dipulangkan.');
    }
}