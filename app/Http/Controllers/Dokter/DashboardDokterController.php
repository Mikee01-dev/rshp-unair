<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use Illuminate\Support\Facades\Auth;

class DashboardDokterController extends Controller
{
    public function index()
    {
        // Ambil ID User Dokter yang login
        $userId = Auth::id();

        // Ambil antrian HARI INI yang statusnya 'P' (Proses / Sudah ditriage Perawat)
        // Kita filter juga agar Dokter hanya melihat pasien yang ditugaskan kepadanya (opsional)
        // Disini kita ambil semua 'P' agar dokter bisa saling backup jika perlu.
        $antrian = TemuDokter::with(['pet.pemilik.user', 'pet.ras', 'rekamMedis'])
                    ->whereDate('waktu_daftar', date('Y-m-d'))
                    ->where('status', 'P') 
                    ->orderBy('no_urut', 'asc')
                    ->get();

        return view('dokter.dashboard', compact('antrian'));
    }
}