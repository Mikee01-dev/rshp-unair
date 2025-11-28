<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model {
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    protected $guarded = [];
    public $timestamps = false;

    public function pet() 
    {
        return $this->belongsTo(Pet::class, 'idpet');
    }

        public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'iddokter');
    }

    public function rekamMedis()
    {
        // Hubungan: Satu Antrian punya Satu Rekam Medis
        // Parameter 2: Foreign Key di tabel rekam_medis (idreservasi_dokter)
        // Parameter 3: Local Key di tabel temu_dokter (idreservasi_dokter)
        return $this->hasOne(RekamMedis::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }
}
