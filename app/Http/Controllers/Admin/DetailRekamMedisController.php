<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailRekamMedis;
use App\Models\RekamMedis;
use App\Models\KodeTindakanTerapi;
use Illuminate\Http\Request;

class DetailRekamMedisController extends Controller
{
    // 1. SIMPAN DETAIL BARU
    public function store(Request $request, $id_header)
    {
        $request->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string',
        ]);

        DetailRekamMedis::create([
            'idrekam_medis' => $id_header, // ID dari URL
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail ?? '-',
        ]);

        return back()->with('success', 'Item berhasil ditambahkan');
    }

    // 2. FORM EDIT DETAIL (Satu Item)
    public function edit($id)
    {
        $detail = DetailRekamMedis::findOrFail($id);
        $tindakan = KodeTindakanTerapi::all();

        return view('admin.detail-rekam-medis.edit', compact('detail', 'tindakan'));
    }

    // 3. UPDATE DETAIL
    public function update(Request $request, $id)
    {
        $detail = DetailRekamMedis::findOrFail($id);
        
        $request->validate([
            'idkode_tindakan_terapi' => 'required',
            'detail' => 'nullable|string',
        ]);

        $detail->update([
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail,
        ]);

        // Redirect kembali ke halaman Show Header (Induknya)
        return redirect()->route('rekam-medis.show', $detail->idrekam_medis)
                         ->with('success', 'Item diperbarui');
    }

    // 4. HAPUS DETAIL
    public function destroy($id)
    {
        $detail = DetailRekamMedis::findOrFail($id);
        $detail->delete();
        
        return back()->with('success', 'Item dihapus');
    }
}