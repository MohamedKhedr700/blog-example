<?php

namespace App\Console\Commands;

use App\Actions\App;
use Illuminate\Console\Command;

class InstallProject extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'install:app';

    /**
     * The console command description.
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        App\InstallAction::exec();

        return static::SUCCESS;
    }
}
