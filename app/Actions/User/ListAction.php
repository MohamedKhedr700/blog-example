<?php

namespace App\Actions\User;

use App\Actions\Core\Action;
use App\Models\User;
use Illuminate\Support\Collection;

class ListAction extends Action
{
    /**
     * Execute the action.
     */
    public function execute(array $columns = ['*'], array $relations = []): Collection
    {
        return User::query()
            ->select($columns)
            ->with($relations)
            ->get();
    }
}
