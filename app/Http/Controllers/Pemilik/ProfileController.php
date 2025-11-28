<?php
namespace App\Http\Controllers\Pemilik;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();
        return view('pemilik.profile.index', compact('user', 'pemilik'));
    }
}