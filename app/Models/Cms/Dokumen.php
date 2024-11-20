<?php

namespace App\Models\Cms;

use App\Models\User;
use App\Traits\AuditChanges;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Dokumen extends Model
{
    use HasFactory, HasUuids, AuditChanges, SoftDeletes;

    protected $table = 'dokumen';
    protected $fillable = [
        'nama',
        'keterangan',
        'file'
    ];

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });

        // Register the event to remove the file when the model is force deleted
        static::forceDeleted(function ($model) {
            if (isset($model->attributes['file'])) {
                Storage::disk('public')->delete($model->attributes['file']);
            }
        });
    }

    /**
     * Mutator for file attribute to upload file automatically
     *
     * @param \Illuminate\Http\UploadedFile|null $value File to upload
     * @return void
     */
    public function setFileAttribute($value): void
    {
        if(gettype($value) == 'string'){
            return;
        }
        $oldValue = $this->getOriginal('file');
        if ($oldValue && Storage::exists($oldValue)) {
            Storage::delete($oldValue);
        }
        $path = Storage::disk('public')->put('dokumen', $value);
        $this->attributes['file'] = $path;
    }

    /**
     * Download file
     */
    public function download()
    {
        if ($this->attributes['file'] !== null) {
            $storage = Storage::disk('public');
            if (!$storage->exists($this->attributes['file'])) {
                return abort(404, 'File not found');
            } else {
                $name = $this->attributes['nama'] . '.' . pathinfo($this->attributes['file'], PATHINFO_EXTENSION);
                return $storage->download($this->attributes['file'], $name);
            }
        } else {
            return abort(404, 'File not found');
        }
    }
}
