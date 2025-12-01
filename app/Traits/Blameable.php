<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

trait Blameable
{
    // Menggunakan fitur SoftDeletes bawaan Laravel (agar deleted_at terisi)
    use SoftDeletes; 

    /**
     * Booting trait.
     * Fungsi ini akan dijalankan otomatis oleh Laravel saat Model digunakan.
     */
    protected static function bootBlameable()
    {
        // Event 'deleting': Dijalankan OTOMATIS sesaat SEBELUM data dihapus
        static::deleting(function ($model) {
            
            // Cek apakah ada user yang sedang login saat penghapusan terjadi
            if (Auth::check()) {
                
                // Isi kolom 'deleted_by' dengan ID User yang sedang login
                $model->deleted_by = Auth::id();
                
                // Simpan perubahan kolom ini ke database
                // Kita gunakan saveQuietly() agar tidak memicu event lain (opsional, save() biasa juga oke)
                $model->save();
            }
        });
    }
}