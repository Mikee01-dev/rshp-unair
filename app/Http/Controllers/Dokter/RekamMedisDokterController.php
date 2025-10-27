<?php

namespace App\Http\Controllers\Dokter;

use App\Models\RekamMedis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedisDokterController extends Controller
{
    public function rekamMedisSaya()
    {
        $dokterId = Auth::user()->iddokter;

        $rekamMedis = RekamMedis::where('iddokter', $dokterId)
            ->with(['pet', 'detailRekamMedis.kodeTindakanTerapi'])
            ->get();

        return view('dokter.rekam_medis', compact('rekamMedis'));
    }
}
