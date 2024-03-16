<?php

namespace App\Filters;

use Carbon\CarbonInterface;
use EloquentFilter\ModelFilter;

class VerificationFilter extends ModelFilter
{
    /**
     * Filter with a given code.
     */
    public function code(string $code): static
    {
        return $this->where('code', $code);
    }

    /**
     * Filter with a given code.
     */
    public function phone(string $phone): static
    {
        return $this->whereHas('verifiable', function ($query) use ($phone) {
            $query->where('phone', $phone);
        });
    }

    /**
     * Filter with a given date.
     */
    public function fromCreatedAt(CarbonInterface $date): static
    {
        return $this->where('created_at', '>=', $date);
    }
}
