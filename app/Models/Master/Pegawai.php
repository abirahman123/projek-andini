<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $guarded = ['id'];
    public $ignoreOnDelete = [''];

    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_hp',
        'email',
        'kecamatan_id',
        'kelurahan_id',
        'alamat',
        'status',
        'agama_id'

    ];
    protected $attributes = [
        'status' => '1', // Nilai default untuk kolom is_active
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
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mutator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getCurrentJabatan()
    {
        $currentPeriode = Periode::getCurrent();
        if (!$currentPeriode) {
            return 'No current period';
        }

        $currentPeriodeId = $currentPeriode->id;
        $pegawaiId = $this->id;

        $jabatanFungsional = JabatanFungsional::where('periode_id', $currentPeriodeId)
            ->where(function($query) use ($pegawaiId) {
                $query->where('kepala_upt', $pegawaiId)
                      ->orWhere('pembina_utama_muda', $pegawaiId)
                      ->orWhere('pembina', $pegawaiId)
                      ->orWhere('sekretaris', $pegawaiId)
                      ->orWhere('bendahara', $pegawaiId)
                      ->orWhere('pengawas', $pegawaiId)
                      ->orWhere('pengadministrasi_umum', $pegawaiId);
            })
            ->get();

        $positions = [];

        foreach ($jabatanFungsional as $jabatan) {
            if ($jabatan->kepala_upt == $pegawaiId) {
                $positions[] = 'Kepala UPT';
            }
            if ($jabatan->pembina_utama_muda == $pegawaiId) {
                $positions[] = 'Pembina Utama Muda';
            }
            if ($jabatan->pembina == $pegawaiId) {
                $positions[] = 'Pembina';
            }
            if ($jabatan->sekretaris == $pegawaiId) {
                $positions[] = 'Sekretaris';
            }
            if ($jabatan->bendahara == $pegawaiId) {
                $positions[] = 'Bendahara';
            }
            if ($jabatan->pengawas == $pegawaiId) {
                $positions[] = 'Pengawas';
            }
            if ($jabatan->pengadministrasi_umum == $pegawaiId) {
                $positions[] = 'Pengadministrasi Umum';
            }
        }

        return empty($positions) ? 'No positions' : implode(', ', $positions);
    }

}
