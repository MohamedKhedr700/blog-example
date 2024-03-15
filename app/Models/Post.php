<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'phone',
    ];

    /**
     * {@inheritDoc}
     */
    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    /**
     * Set user id.
     */
    public function setUser(int $userId): void
    {
        $this->user_id = $userId;
    }

    /**
     * Get a user that belongs to a post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
