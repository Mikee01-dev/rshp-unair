<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter; // <--- JANGAN LUPA IMPORT MODEL INI

class DashboardPerawatController extends Controller
{
    public function index()
    {
        // 1. Ambil data antrian hari ini yang statusnya 'B' (Belum/Menunggu)
        // Logika ini sama dengan yang kita bahas sebelumnya
        $antrian = TemuDokter::with(['pet.pemilik.user', 'pet.ras'])
                    ->whereDate('waktu_daftar', date('Y-m-d'))
                    ->where('status', 'B') 
                    ->orderBy('no_urut', 'asc')
                    ->get();

        // 2. Kirim variabel $antrian ke View
        // Pastikan nama view sesuai lokasi file kamu.
        // Berdasarkan error log kamu, lokasinya di: resources/views/perawat/dashboard.blade.php
        return view('perawat.dashboard', compact('antrian'));
    }
}