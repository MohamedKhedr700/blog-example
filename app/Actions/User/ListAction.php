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
    public function execute(array $columns = ['*']): Collection
    {
        return User::query()
            ->select($columns)
            ->get();
    }
}
