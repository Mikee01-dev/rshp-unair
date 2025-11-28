<?php
namespace App\Http\Controllers\Perawat;
use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Cari Pasien
        $query = Pet::with(['pemilik.user', 'ras.jenisHewan']);
        
        if($request->has('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        $pets = $query->latest('idpet')->get();
        return view('perawat.pasien.index', compact('pets'));
    }
}