<?php
namespace App\Http\Controllers\Pemilik;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;
use App\Models\Pet;

class PetPemilikController extends Controller
{
    public function index()
    {
        // Ambil data pemilik berdasarkan user login
        $pemilik = Pemilik::where('iduser', Auth::id())->first();
        
        // Ambil hewan HANYA milik orang ini
        $pets = Pet::with('ras.jenisHewan')
                   ->where('idpemilik', $pemilik->idpemilik)
                   ->get();

        return view('pemilik.pet.index', compact('pets'));
    }
}