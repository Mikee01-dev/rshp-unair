<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class Pemilik extends Model
{
    use Blameable;
    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';

    public $timestamps = false;
    
    protected $fillable = [
        'iduser',
        'alamat',
        'no_wa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

        public function pets()
    {
        return $this->hasMany(Pet::class, 'idpemilik', 'idpemilik');
    }
}
