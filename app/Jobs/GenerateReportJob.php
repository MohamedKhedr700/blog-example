<?php

namespace App\Jobs;

use App\Mail\ReportMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class GenerateReportJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly array $admins,
        private readonly array $users,
        private readonly array $posts,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (empty($this->users) && empty($this->posts)) {
            return;
        }

        Mail::to($this->admins)->send(new ReportMail($this->users, $this->posts));
    }
}
