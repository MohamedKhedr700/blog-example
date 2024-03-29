<?php

namespace App\Observers;

use App\Jobs\SendVerificationJob;
use App\Models\Verification;

class VerificationObserver
{
    /**
     * Handle the verification "creating" event.
     */
    public function creating(Verification $verification): void
    {
        $verification->setAttribute('code', random_code(4));
    }

    /**
     * Handle the verification "created" event.
     */
    public function created(Verification $verification): void
    {
        SendVerificationJob::dispatch($verification);
    }
}
