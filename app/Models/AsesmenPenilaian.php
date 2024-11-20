<?php

namespace App\Models;

use App\DataTables\Asesor\AsesmenJadwalDataTable;
use App\Models\Admin\Asesor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesmenPenilaian extends Model
{
    use HasFactory;

    protected $table = 'asesmen_penilaian';
    protected $guarded = ['id'];

    public function asesmen_jadwal()
    {
        return $this->belongsTo(AsesmenJadwal::class, 'asesmen_id', 'id');
    }

    public function asesor()
    {
        return $this->belongsTo(Asesor::class, 'asesor_id', 'id');
    }
}
