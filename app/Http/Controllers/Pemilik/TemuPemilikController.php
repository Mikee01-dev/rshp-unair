<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TemuDokter;
use App\Models\Pet;

class TemuPemilikController extends Controller
{
    /**
     * Menampilkan daftar Temu Dokter untuk Pet milik user yang sedang login.
     * Route: /pemilik/temu-dokter
     */
    public function index()
    {
        // Ambil pemilik terkait user login
        $pemilik = Auth::user()->pemilik;

        if (!$pemilik) {
            abort(403, 'Anda tidak memiliki akses ke Temu Dokter.');
        }

        // Ambil semua ID Pet milik pemilik
        $petIds = Pet::where('idpemilik', $pemilik->idpemilik)->pluck('idpet');

        // Query TemuDokter untuk pet milik pemilik ini
        $temuDokter = TemuDokter::with(['pet', 'dokter'])
                        ->whereIn('idpet', $petIds)
                        ->orderBy('waktu_daftar', 'desc') // Ganti 'tanggal' → 'waktu_daftar'
                        ->get();


        return view('pemilik.temu-dokter.index', compact('temuDokter'));
    }
}
