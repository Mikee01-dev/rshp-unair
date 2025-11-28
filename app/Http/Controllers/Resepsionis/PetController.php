<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\JenisHewan;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with(['ras.jenisHewan', 'pemilik.user'])->latest('idpet')->get();
        return view('resepsionis.pet.index', compact('pets'));
    }

    public function create()
    {
        $pemiliks = Pemilik::with('user')->get();
        $jenis_hewans = JenisHewan::all();
        $ras_hewans = RasHewan::all(); 
        return view('resepsionis.pet.create', compact('pemiliks', 'jenis_hewans', 'ras_hewans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'idpemilik' => 'required',
            'idras_hewan' => 'required',
            'jenis_kelamin' => 'required',
            'warna_tanda' => 'required',
        ]);

        Pet::create([
            'nama' => $request->nama,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warna_tanda' => $request->warna_tanda,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('resepsionis.pet.index')->with('success', 'Pasien Hewan terdaftar');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemiliks = Pemilik::with('user')->get();
        $jenis_hewans = JenisHewan::all();
        $ras_hewans = RasHewan::all();
        return view('resepsionis.pet.edit', compact('pet', 'pemiliks', 'jenis_hewans', 'ras_hewans'));
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->except(['_token', '_method', 'dummy_jenis']));
        return redirect()->route('resepsionis.pet.index')->with('success', 'Data Hewan diperbarui');
    }

    public function destroy($id)
    {
        Pet::findOrFail($id)->delete();
        return back()->with('success', 'Data dihapus');
    }
}