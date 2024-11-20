<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapingAssesor extends Model
{
    use HasFactory;
    protected $table = 'asesmen_penilaian';
    protected $guarded = ['id'];

    public function asesmen()
    {
        return $this->belongsTo(JadwalAsesmen::class, 'asesmen_id');
    }

    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }
}
