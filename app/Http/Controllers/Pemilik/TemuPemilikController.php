<?php
namespace App\Http\Controllers\Pemilik;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;
use App\Models\TemuDokter;

class TemuPemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::where('iduser', Auth::id())->first();

        // Ambil jadwal temu dimana hewannya milik user ini
        $jadwal = TemuDokter::with(['pet.ras'])
                    ->whereHas('pet', function($q) use ($pemilik) {
                        $q->where('idpemilik', $pemilik->idpemilik);
                    })
                    ->orderBy('waktu_daftar', 'desc')
                    ->get();

        return view('pemilik.temu-dokter.index', compact('jadwal'));
    }
}