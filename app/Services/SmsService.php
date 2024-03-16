<?php

namespace App\Services;

use App\Services\Contracts\SmsProvider;
use App\Services\Contracts\SmsService as SmsServiceInterface;

readonly class SmsService implements SmsServiceInterface
{
    /**
     * Creat a new sms service instance.
     */
    public function __construct(
        private SmsProvider $smsProvider,
    ) {

    }

    /**
     * {@inheritDoc}
     */
    public static function new(): static
    {
        return app(static::class);
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $phone, string $message): void
    {
        $this->smsProvider->send($phone, $message);
    }
}
