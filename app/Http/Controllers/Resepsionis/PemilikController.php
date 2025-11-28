<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemilikController extends Controller
{
    public function index()
    {
        $pemiliks = Pemilik::with('user')->latest('idpemilik')->get();
        return view('resepsionis.pemilik.index', compact('pemiliks'));
    }

    public function create()
    {
        return view('resepsionis.pemilik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'no_wa' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Buat User Login
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // 2. Assign Role Pemilik (ID 5)
            RoleUser::create(['iduser' => $user->iduser, 'idrole' => 5, 'status' => 1]);

            // 3. Buat Profil Pemilik
            Pemilik::create([
                'iduser' => $user->iduser,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);
        });

        return redirect()->route('resepsionis.pemilik.index')->with('success', 'Pemilik baru berhasil didaftarkan');
    }

    public function edit($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        return view('resepsionis.pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        
        $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:user,email,' . $pemilik->user->iduser . ',iduser',
        ]);

        DB::transaction(function () use ($request, $pemilik) {
            $pemilik->user->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
            
            if ($request->password) {
                $pemilik->user->update(['password' => Hash::make($request->password)]);
            }

            $pemilik->update([
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);
        });

        return redirect()->route('resepsionis.pemilik.index')->with('success', 'Data diperbarui');
    }

    public function destroy($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $user = $pemilik->user;
        
        // Cek apakah punya hewan? Kalau ada, jangan dihapus sembarangan (opsional)
        // Disini kita hapus paksa
        DB::transaction(function () use ($pemilik, $user) {
            $pemilik->delete();
            RoleUser::where('iduser', $user->iduser)->delete();
            $user->delete();
        });

        return redirect()->route('resepsionis.pemilik.index')->with('success', 'Pemilik dihapus');
    }
}