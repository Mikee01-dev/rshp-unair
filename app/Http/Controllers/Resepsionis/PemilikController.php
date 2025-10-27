<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::all();
        return view('resepsionis.pemilik.index', compact('pemilik'));
    }
}
