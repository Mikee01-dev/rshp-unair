<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with(['ras.jenis', 'pemilik.user'])->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $ras = RasHewan::with('jenis')->get();
        $pemilik = Pemilik::all();
        return view('admin.pet.create', compact('ras', 'pemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pet' => 'required|string|max:255',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        Pet::create([
            'nama_pet' => $request->nama_pet,
            'idras_hewan' => $request->idras_hewan,
            'idpemilik' => $request->idpemilik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.pet.index')->with('success', 'Data hewan peliharaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('admin.pet.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pet' => 'required|string|max:255',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update([
            'nama_pet' => $request->nama_pet,
            'idras_hewan' => $request->idras_hewan,
            'idpemilik' => $request->idpemilik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.pet.index')->with('success', 'Data hewan peliharaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('admin.pet.index')->with('success', 'Data hewan peliharaan berhasil dihapus.');
    }

    public function formatNamaPet($nama)
    {
        return ucwords(strtolower($nama));
    }

}
