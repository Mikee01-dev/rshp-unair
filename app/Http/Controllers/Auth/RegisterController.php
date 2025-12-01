<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Pemilik;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // Penting untuk transaksi database

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini menangani pendaftaran user baru serta validasinya.
    | Setelah mendaftar, user akan otomatis login.
    |
    */

    use RegistersUsers;

    /**
     * Setelah register sukses, arahkan ke dashboard pemilik.
     */
    protected $redirectTo = '/pemilik/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // Pastikan nama tabel user kamu benar ('user' atau 'users')
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            
            // 1. INPUT DATA KE TABEL USER
            // Perhatikan: Form mengirim 'name', tapi kolom database kamu 'nama'
            $user = User::create([
                'nama' => $data['name'], 
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // 2. SET ROLE OTOMATIS JADI 'PEMILIK' (ID Role 5)
            RoleUser::create([
                'iduser' => $user->iduser, // Sesuaikan dengan Primary Key tabel User
                'idrole' => 5, // ID Role Pemilik
                'status' => 1
            ]);

            // 3. BUAT PROFIL KOSONG DI TABEL PEMILIK
            // Karena di form register belum ada input alamat/wa, kita isi null dulu.
            // Pastikan kolom no_wa dan alamat di database settings-nya 'Nullable' (Boleh Null).
            Pemilik::create([
                'iduser' => $user->iduser,
                'no_wa' => null, 
                'alamat' => null, 
            ]);

            return $user;
        });
    }
}