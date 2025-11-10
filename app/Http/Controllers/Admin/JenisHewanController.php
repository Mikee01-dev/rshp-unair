<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = DB::table('jenis_hewan')->get();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $this->validateJenisHewan($request);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($request->nama_jenis_hewan),
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisHewan = DB::table('jenis_hewan')->where('idjenis_hewan', $id)->first();
        if (!$jenisHewan) {
            abort(404);
        }
        return view('admin.jenis-hewan.edit', compact('jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $this->validateJenisHewan($request);

        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($request->nama_jenis_hewan),
        ]);

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('jenis_hewan')->where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenis-hewan.index')->with('success', 'Jenis hewan berhasil dihapus.');
    }

    private function validateJenisHewan(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:255',
        ]);
    }

    private function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }
}
