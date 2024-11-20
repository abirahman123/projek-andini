<?php

namespace App\Models\Cms;

use App\Models\User;
use App\Traits\HasAuthorStamp;

use App\Traits\AuditChanges;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Cms\KategoriBerita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, HasAuthorStamp;

    public $with = ['author', 'mutator'];

    protected $table = 'news';

    protected $fillable = [
        'kategori_berita_id',
        'image_url',
        'title',
        'description',
        'image_url',
        'created_by',
        'updated_by',
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function mutator()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function kategori_berita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'id');
    }
}
