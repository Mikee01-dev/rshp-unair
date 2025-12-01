<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;

class KategoriKlinis extends Model
{
    use Blameable;
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori_klinis',
    ];
}
