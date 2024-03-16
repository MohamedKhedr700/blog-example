<?php

namespace App\Console\Commands;

use App\Actions\App\GenerateReportAction;
use Illuminate\Console\Command;

class GenerateReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'generate:report';

    /**
     * The console command description.
     */
    protected $description = 'Generate admin report';

    /**
     * Crate a new command instance.
     */
    public function __construct(
        private readonly GenerateReportAction $generateReportAction,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->generateReportAction->execute();

        return static::SUCCESS;
    }
}
