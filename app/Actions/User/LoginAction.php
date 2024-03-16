<?php

namespace App\Actions\User;

use Illuminate\Auth\AuthenticationException;

class LoginAction
{
    /**
     * Handle the action.
     *
     * @throws AuthenticationException
     */
    public function execute(array $data): string
    {
        $token = auth()->attempt($data);

        if (! $token) {
            throw new AuthenticationException(__('auth.failed'));
        }

        if (! auth()->user()->isVerified()) {
            throw new AuthenticationException(__('auth.not_verified'));
        }

        return $token;
    }
}
