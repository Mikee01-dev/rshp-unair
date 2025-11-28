<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    // 1. INDEX (DAFTAR RIWAYAT)
    public function index(Request $request)
    {
        // Ambil data rekam medis + relasi
        $query = RekamMedis::with(['pet.pemilik.user', 'dokter.user']);

        // Fitur Cari berdasarkan Nama Hewan
        if ($request->has('search')) {
            $query->whereHas('pet', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // Urutkan dari yang terbaru
        $riwayat = $query->latest('created_at')->get();

        return view('dokter.rekam-medis.index', compact('riwayat'));
    }

    // 2. SHOW (DETAIL RIWAYAT)
    public function show($id)
    {
        // Load detail obatnya juga untuk dilihat dokter
        $rm = RekamMedis::with(['details.tindakan', 'pet.pemilik.user', 'dokter.user'])->findOrFail($id);
        
        return view('dokter.rekam-medis.show', compact('rm'));
    }
}