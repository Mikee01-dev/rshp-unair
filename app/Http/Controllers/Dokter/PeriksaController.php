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
    public function edit($id)
    {
        $rm = RekamMedis::with(['details.tindakan', 'pet.pemilik.user', 'pet.ras'])->findOrFail($id);
        
        $tindakan = KodeTindakanTerapi::all();

        return view('dokter.periksa.edit', compact('rm', 'tindakan'));
    }

    public function updateDiagnosa(Request $request, $id)
    {
        $rm = RekamMedis::findOrFail($id);
        
        $request->validate([
            'diagnosa' => 'required|string',
        ]);

        $rm->update([
            'diagnosa' => $request->diagnosa,
            'anamnesa' => $request->anamnesa,
        ]);

        return back()->with('success', 'Diagnosa berhasil disimpan.');
    }

    public function storeDetail(Request $request, $id)
    {
        $request->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string'
        ]);

        DetailRekamMedis::create([
            'idrekam_medis' => $id,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail ?? '-'
        ]);

        return back()->with('success', 'Tindakan/Obat ditambahkan.');
    }

    public function destroyDetail($id_detail)
    {
        $detail = DetailRekamMedis::findOrFail($id_detail);
        $detail->delete();
        
        return back()->with('success', 'Item berhasil dihapus.');
    }

    public function editDetail($id_detail)
    {
        $detail = DetailRekamMedis::findOrFail($id_detail);
        $tindakan = KodeTindakanTerapi::all();

        return view('dokter.periksa.edit_detail', compact('detail', 'tindakan'));
    }

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

        return redirect()->route('dokter.periksa.edit', $detail->idrekam_medis)
                         ->with('success', 'Item obat berhasil diperbarui.');
    }

    public function selesai($id)
    {
        $rm = RekamMedis::findOrFail($id);
        
        if (empty($rm->diagnosa) || $rm->diagnosa == 'Belum ada diagnosa' || $rm->diagnosa == 'Belum diperiksa dokter') {
            return back()->with('error', 'Mohon isi Diagnosa Utama terlebih dahulu!');
        }

        if ($rm->idreservasi_dokter) {
            TemuDokter::where('idreservasi_dokter', $rm->idreservasi_dokter)
                      ->update(['status' => 'S']);
        }

        return redirect()->route('dokter.dashboard')->with('success', 'Pemeriksaan selesai. Pasien dipulangkan.');
    }
}