<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class RefKecamatan extends Model
{
    protected $table = 'ref_kecamatan';

    protected $fillable = [
        'kode_kecamatan', 'nama_kecamatan'
    ];
}
