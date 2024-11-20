<?php

namespace App\Models\Master;

use App\Models\User;
use App\Traits\HasAuthorStamp;

use App\Models\Master\Periode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersyaratanDispensasi extends Model
{
    use HasFactory, HasAuthorStamp;
    public $with = ['author', 'mutator'];
    protected $table = 'ref_persyaratan';
    protected $guarded = ['id'];

    protected $fillable = [
        'periode_id',
        'nama_persyaratan',
        'keterangan',
        'file_pendukung',
        'is_wajib',
        'is_active'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mutator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function download()
    {
        if ($this->attributes['file_pendukung'] !== null) {
            $storage = Storage::disk('public');
            if (!$storage->exists($this->attributes['file_pendukung'])) {
                return abort(404, 'File not found');
            } else {
                $name = $this->attributes['nama_persyaratan'] . '.' . pathinfo($this->attributes['file_pendukung'], PATHINFO_EXTENSION);
                return $storage->download($this->attributes['file_pendukung'], $name);
            }
        } else {
            return abort(404, 'File not found');
        }
    }

    public function getFileTypeAttribute(): string
    {
        $ext = pathinfo($this->attributes['file_pendukung'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $type = 'File';
        switch ($ext) {
            case 'pdf':
                $type = 'PDF';
                break;
            case 'doc':
            case 'docx':
                $type = 'Word';
                break;
            case 'xls':
            case 'xlsx':
                $type = 'Excel';
                break;
            case 'ppt':
            case 'pptx':
                $type = 'Powerpoint';
                break;
            case 'zip':
                $type = 'Zip';
                break;
            case 'rar':
                $type = 'Rar';
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $type = 'Image';
                break;
            default:
                $type = 'File';
                break;
        }
        return $type;
    }

    public function persyaratan()
    {
        return $this->hasOne(PersyaratanDispensasi::class, 'id', 'persyaratan_id');
    }
}
