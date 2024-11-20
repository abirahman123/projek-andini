<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * Mendapatkan jumlah data dalam tabel asesor.
     *
     * @return int
     */
    public static function jumlahData()
    {
        return self::count();
    }
}
