<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';
    protected $guarded = ['id'];
    public $breadcrumbLabelCol = 'nama';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agama()
    {
        return $this->belongsTo(Master\Agama::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Master\Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Master\Kelurahan::class);
    }

    public function catin()
    {
        return $this->hasMany(Catin::class);
    }

    public function dispensasi()
    {
        return $this->hasOne(Dispensasi::class, 'register_id', 'id');
    }
}
