<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Instansi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instansi';
    protected $fillable = [
        'nama_instansi',
        'nama_pendek',
        'alamat',
        'telepon',
        'fax',
        'email',
        'website',
        'logo',
    ];

    public function setLogoAttribute($value): void
    {
        if ($this->seed) {
            $this->attributes['logo'] = $value;
            return;
        }

        if (gettype($value) == 'string') {
            return;
        }
        $oldValue = $this->getOriginal('logo');
        if ($oldValue && Storage::exists('public/' . $oldValue)) {
            Storage::delete('public/' . $oldValue);
        }
        $path = Storage::disk('public')->put('logo', $value);
        $this->attributes['logo'] = $path;
    }

    /**
     * Get logo file with info
     *
     * @return array|null
     */
    public function logoFile() : ?array {
        $logo = $this->logo;
        if(!$logo) {
            return null;
        }
        try {
            return getFileInfo($logo);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getLogoAsArray() : array {
        // Get logo
        $logo = $this->logoFile();
        if ($logo) {
            return [$logo];
        }

        // Return empty array if logo is not found
        return [];
    }

    /**
     * Mendapatkan jumlah data dalam tabel asesmen_jadwal.
     *
     * @return int
     */
    public static function Jadwal()
    {
        return self::count();
    }
}
