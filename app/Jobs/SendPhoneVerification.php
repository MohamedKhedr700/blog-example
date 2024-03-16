<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPhoneVerification implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly User $user,
    ) {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $code = random_code(4);

        $this->user->verification()->create([
            'code' => $code,
        ]);

        SmsService::new()->send(
            $this->user->getAttribute('phone'),
            __('message.send_phone_verification', [
                'code' => $code,
            ]),
        );
    }
}
