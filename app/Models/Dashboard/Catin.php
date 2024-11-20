<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catin extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catin';

    /**
     * Mendapatkan jumlah data dalam tabel asesmen_jadwal.
     *
     * @return int
     */
}
