<?php

namespace App\Actions\User;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\User;

class ListAction extends CoreListAction
{
    /**
     * Index resources.
     */
    protected function index(array $filters = [], array $columns = ['*'], array $relations = [])
    {
        return User::filter($filters)
            ->select($columns)
            ->with($relations);
    }
}
