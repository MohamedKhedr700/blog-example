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
    public function execute(string $phone): bool
    {
        return $this->updateByAction->execute(
            ['phone' => $phone],
            ['verified_at' => now()],
        );
    }
}
