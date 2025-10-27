<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pet', 'detailRekamMedis.kodeTindakanTerapi'])->get();

        return view('perawat.rekam-medis.index', compact('rekamMedis'));
    }
}
