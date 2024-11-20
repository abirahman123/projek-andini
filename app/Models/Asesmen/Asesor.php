<?php

namespace App\Models\Asesmen;


use App\Models\User;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asesor extends Model
{
    use HasFactory, HasUuids;
        
    protected $table = 'asesor';
    protected $guarded = ['id'];
    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama', 'nomor_hp', 'jenis_kelamin', 'kecamatan_id', 
        'kelurahan_id', 'alamat', 'user_id', 'status', 'email'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? '1';
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id ?? '1';
        });
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}