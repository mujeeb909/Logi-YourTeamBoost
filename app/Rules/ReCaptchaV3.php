<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ReCaptchaV3 implements ValidationRule
{
    public function __construct(
        private ?string $action = null,
        private ?float $minScore = null)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $client = new Client;
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                    [
                        'secret' => config('services.recaptcha.secret'),
                        'response' => $value
                    ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}