<?php

namespace App\Models;

use App\Models\Master\Periode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesmenJadwal extends Model
{
    use HasFactory;

    protected $table = 'asesmen_jadwal';
    protected $guarded = ['id'];

    public function dispensasi()
    {
        return $this->belongsTo(Dispensasi::class, 'dispensasi_id');
    }

    public function asesmen_penilaian()
    {
        return $this->hasOne(AsesmenPenilaian::class, 'asesmen_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}

