<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Lab404\Impersonate\Services\ImpersonateManager;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Models\AsesorProfile;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Impersonate, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImpersonator()
    {
        return app(ImpersonateManager::class)->getImpersonator();
    }

    public function register()
    {
        return $this->hasOne(Register::class);
    }

    public function asesor()
    {
        return $this->hasOne(AsesorProfile::class);
    }

}
