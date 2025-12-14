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
    public function index(Request $request)
    {
        $query = RekamMedis::with(['pet.pemilik.user', 'dokter.user']);

        if ($request->has('search')) {
            $query->whereHas('pet', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $riwayat = $query->latest('created_at')->get();

        return view('perawat.rekam-medis.index', compact('riwayat'));
    }

    public function create($idreservasi)
    {
        $reservasi = TemuDokter::with(['pet.pemilik.user'])->findOrFail($idreservasi);
        
        $dokters = RoleUser::where('idrole', 2)->with('user')->get();

        return view('perawat.triage.create', compact('reservasi', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'idpet' => 'required',
            'dokter_pemeriksa' => 'required', 
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            
            RekamMedis::create([
                'idreservasi_dokter' => $request->idreservasi_dokter,
                'idpet' => $request->idpet,
                'dokter_pemeriksa' => $request->dokter_pemeriksa,
                'anamnesa' => $request->anamnesa,
                'temuan_klinis' => $request->temuan_klinis,
                'diagnosa' => 'Belum diperiksa dokter', 
                'created_at' => now(),
            ]);

            $reservasi = TemuDokter::findOrFail($request->idreservasi_dokter);
            $reservasi->update(['status' => 'P']);
        });

        return redirect()->route('perawat.dashboard')->with('success', 'Data awal pasien berhasil disimpan. Pasien siap diperiksa Dokter.');
    }

    public function edit($id)
    {
        $rm = RekamMedis::with(['pet.pemilik.user', 'pet.ras'])->findOrFail($id);
        
        $dokters = RoleUser::where('idrole', 2)->with('user')->get();

        return view('perawat.triage.edit', compact('rm', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $rm = RekamMedis::findOrFail($id);

        $request->validate([
            'dokter_pemeriksa' => 'required',
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
        ]);

        $rm->update([
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
        ]);

        return redirect()->route('perawat.rekam-medis.index')->with('success', 'Data Triage berhasil diperbarui.');
    }

    public function show($id)
    {
        $rm = RekamMedis::with(['details.tindakan', 'pet.pemilik.user', 'dokter.user'])
              ->findOrFail($id);
              
        return view('perawat.rekam-medis.show', compact('rm'));
    }

        public function destroy($id)
    {

        RekamMedis::findOrFail($id)->delete();
        return redirect()->route('perawat-rekam-medis.index')->with('success', 'Data Rekam Medis dihapus');
    }
}