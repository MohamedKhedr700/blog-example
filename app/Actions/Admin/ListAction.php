<?php

namespace App\Actions\Admin;

use App\Actions\Core\ListAction as CoreListAction;
use App\Models\Admin;

class ListAction extends CoreListAction
{
    /**
     * Index resources.
     */
    protected function index(array $filters = [], array $columns = ['*'], array $relations = [])
    {
        return Admin::filter($filters)
            ->select($columns)
            ->with($relations);
    }
}
