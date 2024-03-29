<?php

namespace App\Models;

use App\Filters\UserFilter;
use App\Traits\Models\WithJwt;
use Database\Factories\UserFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Filterable;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use WithJwt;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'phone',
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
        'created_at' => 'datetime:Y-m-d h:i:s a',
        'password' => 'hashed',

    ];

    /**
     * {@inheritDoc}
     */
    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    /**
     * Define model filter.
     */
    public function modelFilter(): ?string
    {
        return $this->provideFilter(UserFilter::class);
    }

    /**
     * Determine if a user is verified.
     */
    public function isVerified(): bool
    {
        return (bool) $this->getAttribute('verified_at');
    }

    /**
     * Get posts that belong to a user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the user verification.
     */
    public function verification(): MorphOne
    {
        return $this->morphOne(Verification::class, 'verifiable');
    }
}
