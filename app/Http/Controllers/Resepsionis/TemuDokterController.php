<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;

class TemuDokterController extends Controller
{
    public function index()
    {
        $temu_dokter = TemuDokter::with(['pet.pemilik'])->get();
        return view('resepsionis.temu-dokter.index', compact('temu_dokter'));
    }
}
