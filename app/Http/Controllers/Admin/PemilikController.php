<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        return view('admin.pemilik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            $user = User::create([
                'nama' => ucwords(strtolower($request->nama)),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $idRolePemilik = 5;
            \App\Models\RoleUser::create([
                'iduser' => $user->iduser,
                'idrole' => $idRolePemilik,
            ]);

            Pemilik::create([
                'iduser' => $user->iduser,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('admin.pemilik.index')
                ->with('success', 'Pemilik berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan pemilik: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        return view('admin.pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'nullable|string|min:6',
            'no_wa'    => 'required|string|max:20',
            'alamat'   => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $pemilik = Pemilik::findOrFail($id);
            $user = $pemilik->user;

            $user->nama  = ucwords(strtolower($request->nama));
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            $pemilik->update([
                'no_wa'  => $request->no_wa,
                'alamat' => $request->alamat,
            ]);

            DB::commit();

            return redirect()->route('pemilik.index')
                ->with('success', 'Data pemilik berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal memperbarui data: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $pemilik = Pemilik::findOrFail($id);
            $user = $pemilik->user;

            $pemilik->delete();

            if ($user) {
                $user->delete();
            }

            DB::commit();

            return redirect()->route('pemilik.index')
                ->with('success', 'Pemilik berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal menghapus pemilik: ' . $e->getMessage()]);
        }
    }
    public function formatNamaPemilik($nama)
    {
        return ucwords(strtolower($nama));
    }
}
