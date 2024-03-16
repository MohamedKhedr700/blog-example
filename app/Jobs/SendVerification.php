<?php

namespace App\Jobs;

use App\Models\Verification;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVerification implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly Verification $verification,
    ) {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        SmsService::new()->send(
            $this->verification->verifiable()
                ->select('phone')
                ->first()
                ->getAttribute('phone'),
            $this->verification->getMessage(),
        );
    }
}
