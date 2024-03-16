<?php

namespace App\Models;

use App\Filters\UserFilter;
use App\Filters\VerificationFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Verification extends Model
{
    use Filterable;

    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [];

    /**
     * Define model filter.
     */
    public function modelFilter(): ?string
    {
        return $this->provideFilter(VerificationFilter::class);
    }

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
