<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model 
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function pet() {
        return $this->belongsTo(Pet::class, 'idpet');
    }

    public function dokter() {
        // Relasi ke tabel role_user, lalu ke user
        return $this->belongsTo(RoleUser::class, 'dokter_pemeriksa', 'idrole_user');
    }

    public function details() {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis');
    }

}
