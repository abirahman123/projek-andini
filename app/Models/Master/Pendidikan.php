<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'ref_pendidikan';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? 1;
            $model->created_at = now('Asia/Jakarta');
        });
        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id ?? 1;
            $model->updated_at = now('Asia/Jakarta');
        });
    }
}
