<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter; // Model tabel 'dokter'

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil detail data dokter (alamat, spesialisasi, dll)
        $dokter = Dokter::where('id_user', $user->iduser)->first();
        
        return view('dokter.profile.index', compact('user', 'dokter'));
    }
}