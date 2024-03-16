<?php

namespace App\Filters;

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
}
