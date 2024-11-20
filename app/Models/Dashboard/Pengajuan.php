<?php

namespace App\Models\Dashboard;

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
    public static function pengajuan()
    {
        return self::count();
    }
    public static function disetujui()
{
    return self::where('status_persetujuan', 'APPROVED')->count();
}
public static function data()
    {
        return self::count();
    }
}
