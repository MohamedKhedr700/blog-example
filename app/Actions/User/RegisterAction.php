<?php

namespace App\Actions\User;

use App\Models\User;

class RegisterAction
{
    /**
     * Handle the action.
     */
    public function execute(array $data): User
    {
        return User::create($data);
    }
}
