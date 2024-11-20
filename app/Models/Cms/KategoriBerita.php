<?php

namespace App\Models\Cms;

use App\Models\Cms\News;
use App\Traits\RestrictOnDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBerita extends Model
{
    use HasFactory, SoftDeletes, RestrictOnDelete;

    protected $table = 'kategori_news';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description'
    ];
    // public $ignoreOnDelete = [''];

    public function berita()
    {
        return $this->hasMany(News::class, 'kategori_berita_id','id');
    }
}