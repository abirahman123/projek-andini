<?php

namespace App\Models\Admin;

// use App\Models\Register;
// use App\Models\Master\Periode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalAsesmen extends Model
{
    use HasFactory;

    protected $table = 'asesmen_jadwal';
    protected $guarded = ['id'];

    public function register()
    {
        return $this->belongsTo(Register::class, 'register_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }

    public function asesmen()
    {
        return $this->hasMany(MapingAssesor::class, 'asesmen_id');
    }
}
