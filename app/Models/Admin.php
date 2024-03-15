<?php

namespace App\Models;

use App\Traits\Models\WithJwt;
use Database\Factories\AdminFactory;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use WithJwt;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * {@inheritDoc}
     */
    protected static function newFactory(): AdminFactory
    {
        return AdminFactory::new();
    }

    /**
     * Determine if admin can access to panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
