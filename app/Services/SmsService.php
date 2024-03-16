<?php

namespace App\Services;

class SmsService
{
    /**
     * Get a new sms service instance.
     */
    public static function new(): static
    {
        return new static();
    }

    /**
     * Send an sms message to a given number.
     */
    public function send(string $phone, string $message)
    {

    }
}
