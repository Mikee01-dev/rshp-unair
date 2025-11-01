<?php

namespace App\Http\Controllers\Dokter;

use App\Models\RekamMedis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;

class RekamMedisDokterController extends Controller
{
    public function rekamMedisSaya()
    {
        $userId = Auth::user()->iduser; 

        $roleUserDokter = RoleUser::where('iduser', $userId)
                                    ->where('idrole', 2)
                                    ->first();

        if (!$roleUserDokter) {
            $rekamMedis = collect([]); 
        } else {
            $idRoleUserDokter = $roleUserDokter->idrole_user; 

            $rekamMedis = RekamMedis::where('dokter_pemeriksa', $idRoleUserDokter)
                ->with(['pet', 'detailRekamMedis.kodeTindakanTerapi'])
                ->get();
        }

        return view('dokter.rekam-medis', compact('rekamMedis'));
    }
}
