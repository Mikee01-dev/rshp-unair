<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function layanan()
    {
        return view('site.layanan');
    }

    public function kontak()
    {
        return view('site.kontak');
    }

    public function struktur()
    {
        return view('site.struktur');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function cekKoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return response()->json(['status' => 'Koneksi database berhasil.'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Koneksi database gagal: ' . $e->getMessage()], 500);
        }
    }
}