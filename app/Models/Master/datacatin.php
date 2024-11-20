<?php

namespace App\Models\Master;

use App\Models\Catin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacatin extends Model
{
    use HasFactory;

    protected $table = 'ref_datacatin';
    protected $guarded = ['id'];

    public function catin()
    {
        $catins = datacatin::all();
        return $this->hasMany(datacatin::class);
    }
}
