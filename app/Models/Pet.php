<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pet';
    protected $primaryKey = 'idpet';
    
    // Matikan timestamp jika tabel tidak punya created_at/updated_at
    public $timestamps = false; 

    // OPSI 1: Izinkan semua kolom diisi (Paling Gampang)
    protected $guarded = [];

    // OPSI 2: Atau pakai Fillable (Kalau mau ketat)
    // protected $fillable = ['nama', 'tanggal_lahir', 'warna_tanda', 'jenis_kelamin', 'idpemilik', 'idras_hewan'];

    // --- Relasi ---
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'idpemilik');
    }

    public function ras() // Sesuai nama function yang dipanggil di view: $pet->ras
    {
        return $this->belongsTo(RasHewan::class, 'idras_hewan');
    }

    
}