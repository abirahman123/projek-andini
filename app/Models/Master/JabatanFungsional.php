<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanFungsional extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'jabatan_fungsional';
    protected $guarded = ['id'];

    protected $fillable = [
        'periode_id',
        'kepala_upt',
        'pembina_utama_muda',
        'pembina',
        'sekretaris',
        'bendahara',
        'pengawas',
        'pengadministrasi_umum',
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

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function as_kepala_upt()
    {
        return $this->belongsTo(Pegawai::class, 'kepala_upt', 'id');
    }

    public function as_pembina_utama_muda()
    {
        return $this->belongsTo(Pegawai::class, 'pembina_utama_muda', 'id');
    }

    public function as_pembina()
    {
        return $this->belongsTo(Pegawai::class, 'pembina', 'id');
    }

    public function as_sekretaris()
    {
        return $this->belongsTo(Pegawai::class, 'sekretaris', 'id');
    }

    public function as_bendahara()
    {
        return $this->belongsTo(Pegawai::class, 'bendahara', 'id');
    }

    public function as_pengawas()
    {
        return $this->belongsTo(Pegawai::class, 'pengawas', 'id');
    }

    public function as_pengadministrasi_umum()
    {
        return $this->belongsTo(Pegawai::class, 'pengadministrasi_umum', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mutator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
