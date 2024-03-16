<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Verification extends Model
{
    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [];

    /**
     * Get a verification message.
     */
    public function getMessage(): string
    {
        return __('message.verification_message', [
            'code' => $this->attributes['code'],
        ]);
    }

    /**
     * Get the parent verifiable model.
     */
    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
