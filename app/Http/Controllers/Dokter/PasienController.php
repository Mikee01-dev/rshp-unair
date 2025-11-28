<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = Pet::with(['pemilik.user', 'ras.jenisHewan']);
        
        // Fitur Cari
        if($request->has('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        $pets = $query->latest('idpet')->get();
        
        return view('dokter.pasien.index', compact('pets'));
    }
}