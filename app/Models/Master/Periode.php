<?php

namespace App\Models\Master;

use App\Models\Master\PersyaratanDispensasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{

    use HasFactory;

    protected $table = 'periode';
    protected $guarded = ['id'];
    public $ignoreOnDelete = [''];

    protected $fillable = [
        'periode',
        'tahun',
        'keterangan',
        'is_active'
    ];

    protected $attributes = [
        'is_active' => 1,
    ];
    public function persyaratandispensasi()
    {
        return $this->hasMany(PersyaratanDispensasi::class, 'periode_id', 'id');
    }

    public static function getCurrent()
    {
        return self::where('is_active', 1)->first();
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mutator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function jabatanfungsional()
    {
        return $this->hasOne(JabatanFungsional::class, 'periode_id', 'id');
    }
}
