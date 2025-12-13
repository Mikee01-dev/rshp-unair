<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class Pet extends Model
{
    use HasFactory;
    use Blameable;

    protected $table = 'pet';
    protected $primaryKey = 'idpet';
    
    public $timestamps = false; 

    protected $guarded = [];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'idpemilik');
    }

    public function ras()
    {
        return $this->belongsTo(RasHewan::class, 'idras_hewan');
    }

    
}