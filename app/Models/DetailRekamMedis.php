<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRekamMedis extends Model
{
    use HasFactory;

    protected $table = 'detail_rekam_medis';
    protected $primaryKey = 'iddetail_rekam_medis';
    protected $fillable = ['idrekam_medis', 'idkode_tindakan_terapi', 'detail'];
    public $timestamps = false;

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'idrekam_medis');
    }

    public function kodeTindakanTerapi()
    {
        return $this->belongsTo(KodeTindakanTerapi::class, 'idkode_tindakan_terapi');
    }

        public function tindakan()
    {
        // Relasi ke tabel 'kode_tindakan_terapi'
        // Parameter 2: nama kolom foreign key di tabel detail_rekam_medis
        // Parameter 3: nama kolom primary key di tabel kode_tindakan_terapi
        return $this->belongsTo(KodeTindakanTerapi::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }

}
