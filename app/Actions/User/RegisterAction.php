<?php

namespace App\Actions\User;

use App\Models\User;

readonly class RegisterAction
{
    /**
     * Crate a new action instance.
     */
    public function __construct(
        private SendVerificationAction $sendVerificationAction,
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
