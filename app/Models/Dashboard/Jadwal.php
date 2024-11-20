<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'asesmen_jadwal';

    /**
     * Mendapatkan jumlah data dalam tabel asesmen_jadwal.
     *
     * @return int
     */
    public static function Jadwal()
    {
        return self::count();
    }
}
