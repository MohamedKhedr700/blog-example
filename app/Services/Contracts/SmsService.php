<?php

namespace App\Services\Contracts;

interface SmsService
{
    /**
     * Get a new sms service instance.
     */
    public static function new(): static;

    /**
     * Send an sms message to a given phone number.
     */
    public function send(string $phone, string $message): void;
}
