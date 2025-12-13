<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class DetailRekamMedis extends Model
{
    use HasFactory;
    use Blameable;

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
        return $this->belongsTo(KodeTindakanTerapi::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }

}
