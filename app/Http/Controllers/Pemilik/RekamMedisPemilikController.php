<?php
namespace App\Http\Controllers\Pemilik;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;
use App\Models\RekamMedis;

class RekamMedisPemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::where('iduser', Auth::id())->first();

        $riwayat = RekamMedis::with(['pet.ras', 'dokter.user'])
                    ->whereHas('pet', function($q) use ($pemilik) {
                        $q->where('idpemilik', $pemilik->idpemilik);
                    })
                    ->latest('created_at')
                    ->get();

        return view('pemilik.rekam-medis.index', compact('riwayat'));
    }

    public function show($id)
    {
        // Detail sama seperti view dokter/admin, tapi read-only
        $rm = RekamMedis::with(['details.tindakan', 'pet', 'dokter.user'])->findOrFail($id);
        return view('pemilik.rekam-medis.show', compact('rm'));
    }
}