<?php

namespace App\Models;

use App\Models\Assesor\CatinPersyaratan;
use App\Models\Master\Periode;
use App\Traits\AuditChanges;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Catin extends Model
{
    use HasFactory, HasUuids, AuditChanges;
    protected $ignoreDeletedBy = true;
    protected $table = 'catin';
    protected $guarded = ['id'];
    public const IMAGE_PATH = 'catin';
    protected $appends = ['pas_foto'];

    /**
     * Mutator for photo attribute to upload photo automatically
     *
     * @param $image
     * @return void
     */
    public function setPasFotoAttribute($image)
    {
        if (gettype($image) == 'string') {
            return;
        }

        if ($image) {
            $filename = self::_generateUploadFilename($image, 'pas_foto');
            $path = Storage::putFileAs(self::IMAGE_PATH, $image, $filename);
            $this->attributes['pas_foto'] = $path;
        }
    }

    /**
     * Accessor for photo attribute to get photo from storage
     *
     * @return string
     */
    public function getPasFotoAttribute()
    {
        $defaultImage = asset('assets/images/profile/user-6.jpg');
        return $this->attributes['pas_foto'] ? Storage::url($this->attributes['pas_foto']) : $defaultImage;
    }

    /**
     * Method to get file info for Dropzone
     *
     * @return array|null
     */
    public function getPasFotoFile(): ?array
    {
        $foto = $this->attributes['pas_foto'] ?? null;
        if (!$foto) {
            return [];
        }
        try {
            $file = getFileInfo($foto);
            return [$file];
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Cek kelengkapan berkas calon pengantin
     *
     * @return bool
     */
    public function isBerkasLengkap(): bool
    {
        $persyaratan = Periode::getCurrent()?->persyaratandispensasi
            ->where('is_active', '1');

        if (!$persyaratan) {
            return false;
        }
        if ($persyaratan->count() == 0) {
            return false;
        }

        foreach ($persyaratan as $syarat) {
            if ($syarat->is_wajib == '0') {
                continue;
            }

            $berkas = $this->berkas->where('persyaratan_id', $syarat->id)->first();
            if (!$berkas) {
                return false;
            }
        }

        return true;
    }

    public function jumlahBerkasWajib(): int
    {
        $persyaratan = Periode::getCurrent()?->persyaratandispensasi
            ->where('is_active', '1');

        if (!$persyaratan) {
            return 0;
        }
        if ($persyaratan->count() == 0) {
            return 0;
        }

        $jumlah_berkas = 0;
        foreach ($persyaratan as $syarat) {
            if ($syarat->is_wajib == '0') {
                continue;
            }

            $berkas = $this->berkas->where('persyaratan_id', $syarat->id)->where('status', 'APPROVED')->first();
            if ($berkas) {
                $jumlah_berkas++;
            }
        }

        return $jumlah_berkas;
    }

    /**
     * Generate berkas file name
     *
     * @param $file
     * @param $type
     * @return string
     */
    public function _generateUploadFilename($file, $type)
    {
        $ext = $file->getClientOriginalExtension();
        $random = rand(1000, 9999);
        $filename = $type . '_' . time() . $random . '.' . $ext;
        return $filename;
    }

    public function berkas()
    {
        return $this->hasMany(CatinPersyaratan::class, 'catin_id', 'id');
    }

    public function register()
    {
        return $this->belongsTo(Register::class);
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

    public function pendidikan()
    {
        return $this->belongsTo(Master\Pendidikan::class);
    }

    public function dispensasi()
    {
        return $this->belongsTo(Dispensasi::class);
    }
}
