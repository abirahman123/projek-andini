<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dispensasi';

    /**
     * Mendapatkan jumlah data dalam tabel asesor.
     *
     * @return int
     */
    // untuk menghitung Widget Jumlah Pengajuan Dispensasi Nikah Dini
    public static function pengajuan()
    {
        return self::count();
    }

    // untuk menghitung Widget Jumlah yang disetujui 
    public static function disetujui()
{
    return self::where('status_persetujuan', 'APPROVED')->count();
}
}