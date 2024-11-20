<?php

namespace App\Models;

use App\Models\Admin\JadwalAsesmen;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispensasi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'dispensasi';
    protected $guarded = ['id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function register()
    {
        return $this->belongsTo(Register::class, 'register_id', 'id');
    }

    public function jadwalAsesmen()
    {
        return $this->hasOne(\App\Models\Asesmen\JadwalAsesmen::class, 'dispensasi_id', 'id');
    }

    public function catin()
    {
        return $this->hasMany(Catin::class, 'dispensasi_id', 'id');
    }
    /**
     * Mendapatkan jumlah data dalam tabel asesor.
     *
     * @return int
     */

    protected $with = ['catin_pria', 'catin_wanita'];

    // untuk menghitung Widget Jumlah Pengajuan Dispensasi Nikah Dini


    // untuk menghitung Widget Jumlah yang disetujui
    public static function disetujui()
    {
        return self::where('status_persetujuan', 'APPROVED')->count();
    }

    public function catin_pria()
    {
        return $this->hasOne(Catin::class, 'dispensasi_id', 'id')->where('jenis_kelamin', 'L');
    }

    public function catin_wanita()
    {
        return $this->hasOne(Catin::class, 'dispensasi_id', 'id')->where('jenis_kelamin', 'P');
    }

    public function asesmen_jadwal()
    {
        return $this->hasOne(AsesmenJadwal::class, 'dispensasi_id', 'id');
    }
}
