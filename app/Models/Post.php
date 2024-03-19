<?php

namespace App\Models;

use App\Filters\PostFilter;
use App\Traits\Models\HasLimitChars;
use Database\Factories\PostFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use Filterable;
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
     * {@inheritdoc}
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s a',
    ];

    /**
     * {@inheritDoc}
     */
    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    /**
     * Define model filter.
     */
    public function modelFilter(): ?string
    {
        return $this->provideFilter(PostFilter::class);
    }

    /**
     * Get a user that belongs to a post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
