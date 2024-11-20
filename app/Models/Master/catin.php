<?php

namespace App\Models\Master;

use App\Models\Catin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catins extends Model
{
    use HasFactory;

    protected $table = 'ref_catin';
    protected $guarded = ['id'];

    
  
    public function catin()
    {
        $catins = Catin::all();
        return $this->hasMany(Catin::class);
    }
}
