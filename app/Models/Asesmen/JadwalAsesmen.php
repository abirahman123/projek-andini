<?php

namespace App\Models\Asesmen;

use App\Models\Admin\MapingAssesor;
use App\Models\Dispensasi;
use App\Models\Register;
use App\Models\Master\Periode;
use App\Traits\AuditChanges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalAsesmen extends Model
{
    use HasFactory, AuditChanges;
    protected $ignoreDeletedBy = true;

    protected $table = 'asesmen_jadwal';
    protected $guarded = ['id'];

    public function register()
    {
        return $this->belongsTo(Register::class, 'register_id', 'id');
    }

    public function dispensasi()
    {
        return $this->belongsTo(Dispensasi::class, 'dispensasi_id', 'id');
    }


    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }

    public function penilaian()
    {
        return $this->hasMany(MapingAssesor::class, 'asesmen_id', 'id');
    }

    public function asesmen()
    {
        return $this->hasMany(MapingAssesor::class, 'asesmen_id');
    }
}
