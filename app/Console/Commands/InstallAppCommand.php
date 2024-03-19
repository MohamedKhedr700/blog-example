<?php

namespace App\Console\Commands;

use App\Actions\App\InstallAction;
use Illuminate\Console\Command;

class InstallAppCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     */
    protected $description = 'Install app migration and seeder';

    /**
     * Crate a new command instance.
     */
    public function __construct(
        private readonly InstallAction $installAction,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->installAction->execute();

        return static::SUCCESS;
    }
}
