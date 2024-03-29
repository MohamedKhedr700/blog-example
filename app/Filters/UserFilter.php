<?php

namespace App\Filters;

use Carbon\CarbonInterface;
use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
     * Filter with a given phone.
     */
    public function phone(string $phone): static
    {
        return $this->where('phone', $phone);
    }

    /**
     * Filter with a given start date.
     */
    public function startDate(CarbonInterface $date): static
    {
        return $this->where('created_at', '>=', $date);
    }

    /**
     * Filter with a given end date.
     */
    public function endDate(CarbonInterface $date): static
    {
        return $this->where('created_at', '<=', $date);
    }
}
