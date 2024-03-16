<?php

namespace App\Actions\Core;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class ListAction extends Action
{
    /**
     * Execute the action.
     */
    public function execute(array $filters = [], array $columns = ['*'], array $relations = []): Collection|LengthAwarePaginator
    {
        return $this->hasPage($filters) ?
            $this->paginate($filters, $columns, $relations) :
            $this->all($filters, $columns, $relations);
    }

    /**
     * Determine if action has page filter.
     */
    public function hasPage(array $filters): bool
    {
        return array_key_exists('page', $filters);
    }

    /**
     * Retrieve all resources.
     */
    private function all(array $filters = [], array $columns = ['*'], array $relations = []): Collection
    {
        return $this->index($filters, $columns, $relations)->get();
    }

    /**
     * Retrieve paginated resources.
     */
    private function paginate(array $filters = [], array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->index($filters, $columns, $relations)->paginate(
            $filters['perPage'] ?? 10,
            $filters['page'],
        );
    }

    /**
     * Index resources.
     */
    abstract protected function index();
}
