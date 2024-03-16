<?php

namespace App\Actions\User;

use App\Actions\Core\Action;
use App\Models\User;

class SendVerificationAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(User $user): void
    {
        $user->verification()->create();
    }
}
