<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
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
}
