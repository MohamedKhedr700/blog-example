<?php

namespace App\Actions\App;

use App\Actions\Core\Action;
use Illuminate\Support\Facades\Artisan;

class InstallAction extends Action
{
    /**
     * Handle the action.
     */
    public function execute(): void
    {
        Artisan::call('key:generate');
        Artisan::call('jwt:secret --force');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
}
