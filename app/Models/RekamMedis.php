<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    protected $fillable = ['anamnesa', 'temuan_klinis', 'diagnosa', 'idpet', 'dokter_pemeriksa'];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet');
    }

    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_pemeriksa');
    }

    
}
