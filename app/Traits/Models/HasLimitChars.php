<?php

namespace App\Traits\Models;

use Illuminate\Support\Facades\DB;

trait HasLimitChars
{
    public function scopeLimitChars($query, $field, $limit)
    {
        return $query->raw("LEFT({$field}, $limit) as {$field}");

        return $query->select(DB::raw("LEFT({$field}, $limit) as {$field}"));
    }
}
