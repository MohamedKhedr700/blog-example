<?php

namespace App\Actions\User;

readonly class VerifyAction
{
    /**
     * Create a new action instance.
     */
    public function __construct(
        private UpdateByAction $updateByAction,
    ) {

    }

    /**
     * Handle the action.
     */
    public function execute(array $filters): bool
    {
        return $this->updateByAction->execute($filters, [
            'verified_at' => now(),
        ]);
    }
}
