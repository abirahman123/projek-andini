<?php

namespace App\Models\Assesor;

use App\Models\Catin;
use App\Models\Master\PersyaratanDispensasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CatinPersyaratan extends Model
{
    use HasFactory;
    protected $table = 'catin_persyaratan';
    protected $guarded = ['id'];

    public const FILE_PATH = 'catin/berkas-persyaratan';

    /**
     * Mutator for file attribute to upload photo automatically
     *
     * @param $file
     * @return void
     */
    public function setFilePathAttribute($file)
    {
        if (gettype($file) == 'string') {
            return;
        }

        if ($file) {
            $filename = self::_generateUploadFilename($file, 'berkas_persyaratan');
            $path = Storage::putFileAs(self::FILE_PATH, $file, $filename);
            $this->attributes['file_path'] = $path;
        }
    }

    /**
     * Accessor for photo attribute to get photo from storage
     *
     * @return array
     */
    public function getFilePathAttribute()
    {
        $file = $this->attributes['file_path'];
        try {
            return getFileInfo($file);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function _generateUploadFilename($file, $type)
    {
        $ext = $file->getClientOriginalExtension();
        $filename = $type . '_' . time() . '.' . $ext;
        return $filename;
    }


    public function catin()
    {
        return $this->belongsTo(Catin::class, 'catin_id');
    }

    public function persyaratan()
    {
        return $this->belongsTo(PersyaratanDispensasi::class, 'persyaratan_id');
    }
}
