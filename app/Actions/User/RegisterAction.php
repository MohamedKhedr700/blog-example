<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterAction
{
    /**
     * Crate a new action instance.
     */
    public function __construct(
        private readonly SendVerificationAction $sendVerificationAction,
    ) {

    }

    /**
     * Handle the action.
     */
    public function execute(array $data): User
    {
        $user = User::create($data);

        $this->sendVerificationAction->execute($user);

        return $user;
    }
}
