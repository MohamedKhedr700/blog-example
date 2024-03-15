<?php

namespace App\Actions\User;

use Illuminate\Contracts\Auth\Authenticatable;

class ProfileAction
{
    /**
     * Handle the action.
     */
    public function execute(): Authenticatable
    {
        return auth()->user();
    }
}
