<?php

namespace App\Services;

use App\Services\Contracts\SmsProvider;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class TwilioProvider implements SmsProvider
{
    /**
     * Twilio settings.
     */
    private array $settings;

    /**
     * Creat a new sms provider instance.
     */
    public function __construct()
    {
        $this->settings = config('services.twilio', []);
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $phone, string $message): void
    {
        try {
//            $client = new Client(
//                $this->settings('sid'),
//                $this->settings('token'),
//            );
//
//            $client->messages->create($phone, [
//                'from' => $this->settings('from'),
//                'body' => $message,
//            ]);

        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }

    /**
     * Get provider settings or a value by given key.
     */
    protected function settings(?string $key = null, mixed $default = null): mixed
    {
        return $key ? Arr::get($this->settings, $key, $default) : $this->settings;
    }
}
