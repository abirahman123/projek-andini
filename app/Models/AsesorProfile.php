<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\User;

class AsesorProfile extends Model
{
    protected $table = 'asesor';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'Kecamatan');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
