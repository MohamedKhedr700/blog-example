<?php

namespace App\Actions\App;

use App\Actions\Admin;
use App\Actions\Core\Action;
use App\Actions\Post;
use App\Actions\User;
use App\Jobs\GenerateReportJob;

class GenerateReportAction extends Action
{
    /**
     * Crate a new action instance.
     */
    public function __construct(
        private readonly Admin\ListAction $listAdminAction,
        private readonly User\ListAction $listUserAction,
        private readonly Post\ListAction $listPostAction,
    ) {

    }

    /**
     * Handle the action.
     */
    public function execute(): void
    {
        GenerateReportJob::dispatch(
            $this->getAdmins(),
            $this->getUsers(),
            $this->getPosts(),
        );
    }

    /**
     * Get report admins.
     */
    private function getAdmins(): array
    {
        return $this->listAdminAction
            ->execute([], ['email'])
            ->pluck('email')
            ->toArray();
    }

    /**
     * Get report users.
     */
    private function getUsers(): array
    {
        return $this->listUserAction->execute(
            [
                'startDate' => now()->subDay(),
                'endDate' => now(),
            ],
            ['id', 'username', 'phone', 'email', 'created_at']
        )->toArray();
    }

    /**
     * Get report posts.
     */
    private function getPosts(): array
    {
        return $this->listPostAction->execute(
            [
                'startDate' => now()->subDay(),
                'endDate' => now(),
            ],
            ['id', 'user_id', 'title', 'created_at'],
            ['user:id,username']
        )->toArray();
    }
}
