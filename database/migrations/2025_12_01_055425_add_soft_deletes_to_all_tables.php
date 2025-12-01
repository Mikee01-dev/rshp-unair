<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Daftar tabel yang akan diberikan fitur Soft Delete & Audit Trail
     */
    protected $tables = [
        // 1. Data User & Role
        'user',
        'role',
        'pemilik',
        'dokter',
        'perawat',
        
        // 2. Master Data
        'jenis_hewan',
        'ras_hewan',
        'kategori',
        'kategori_klinis',
        'kode_tindakan_terapi',
        
        // 3. Transaksi & Data Utama
        'pet',
        'temu_dokter',
        'rekam_medis',
        'detail_rekam_medis'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->tables as $tableName) {
            // Cek apakah tabel ada (untuk menghindari error jika tabel belum dibuat)
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) {
                    // 1. Menambahkan kolom 'deleted_at' (TIMESTAMP NULL)
                    // Kolom ini otomatis dikenali Laravel sebagai penanda Soft Delete
                    $table->softDeletes(); 
                    
                    // 2. Menambahkan kolom 'deleted_by' (BIGINT NULL) setelah deleted_at
                    // Kolom ini untuk menyimpan ID User yang menghapus data
                    $table->unsignedBigInteger('deleted_by')->nullable()->after('deleted_at');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) {
                    // Hapus kolom jika rollback
                    $table->dropSoftDeletes(); // Hapus kolom deleted_at
                    $table->dropColumn('deleted_by'); // Hapus kolom deleted_by
                });
            }
        }
    }
};