<?php

namespace App\Models\Admin;

// use App\Models\Register;
// use App\Models\Master\Periode;

use App\Models\Master\Periode;
use App\Models\Register;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asesor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'asesor';
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
        return $this->hasMany(MapingAssesor::class, 'asesor_id');
    }
}
