<?php
namespace App\Http\Controllers\Perawat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Perawat;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $perawat = Perawat::where('id_user', $user->iduser)->first();
        
        return view('perawat.profile.index', compact('user', 'perawat'));
    }
}