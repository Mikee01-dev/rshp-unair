<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class PetPemilikController extends Controller
{
    public function index()
    {
        $pemilik = Auth::user()->pemilik;

        if (!$pemilik) {
            abort(403, 'Anda tidak memiliki akses ke data Pet.');
        }

        $pets = Pet::with(['ras.jenis', 'pemilik.user'])
                    ->where('idpemilik', $pemilik->idpemilik)
                    ->orderBy('nama', 'asc')
                    ->get();

        return view('pemilik.pet.index', compact('pets'));
    }
}
