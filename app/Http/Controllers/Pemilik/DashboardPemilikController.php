<?php
namespace App\Http\Controllers\Pemilik;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\TemuDokter;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::where('iduser', Auth::id())->first();
        
        $total_hewan = Pet::where('idpemilik', $pemilik->idpemilik)->count();
        
        // Cek jadwal kunjungan berikutnya (Upcoming)
        $next_visit = TemuDokter::whereHas('pet', function($q) use ($pemilik){
                            $q->where('idpemilik', $pemilik->idpemilik);
                        })
                        ->where('waktu_daftar', '>=', now())
                        ->where('status', 'B')
                        ->orderBy('waktu_daftar', 'asc')
                        ->first();

        return view('pemilik.dashboard', compact('total_hewan', 'next_visit'));
    }
}