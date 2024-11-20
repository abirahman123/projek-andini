<?php

namespace App\Models\Master;

use App\Models\Master\Kelurahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'ref_kecamatan';
    protected $guarded = ['id'];

    protected $fillable = [
        'kode_kecamatan',
        'nama_kecamatan',
        'latitude',
        'longitude',
        'keterangan',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? '1';
            $model->updated_by = auth()->user()->id ?? '1';
            $model->created_at = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        });
        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id;
            $model->updated_at = now('Asia/Jakarta')->format('Y-m-d H:i:s');
        });
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }
}
