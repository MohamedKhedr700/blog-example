<?php

namespace App\Actions\User;

use App\Actions\Core\Action;
use App\Models\User;
use Illuminate\Support\Collection;

class FindByAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(array $filters, array $columns = ['*'], array $relations = []): ?User
    {
        return User::filter($filters)
            ->select($columns)
            ->with($relations)
            ->first();
    }
}
