<?php

namespace App\Actions\User;

use App\Actions\Core\Action;
use App\Models\User;

class UpdateByAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(array $filters, array $data): bool
    {
        return User::filter($filters)->update($data);
    }
}
