<?php

namespace App\Services\Contracts;

interface SmsProvider
{
    /**
     *  Send an sms message to a given phone number.
     */
    public function send(string $phone, string $message): void;
}
