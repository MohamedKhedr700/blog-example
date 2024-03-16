<?php

namespace App\Actions\Verification;

use App\Actions\Core\Action;
use App\Models\Verification;

class FindByAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(array $filters, array $columns = ['*'], array $relations = []): ?Verification
    {
        return Verification::filter($filters)
            ->select($columns)
            ->with($relations)
            ->first();
    }
}
