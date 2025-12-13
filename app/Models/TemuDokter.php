<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class TemuDokter extends Model 
{
    use Blameable;
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
        return $this->hasOne(RekamMedis::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }
}
