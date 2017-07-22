<?php

namespace App\Validators;

use GuzzleHttp\Client;

class RecaptchaValidator
{

    private $secret;
    private $client;

    public function __construct ()
    {
        $this->secret = env('GOOGLE_RECAPTCHA_SECRET', '');
        $this->client = new Client([ 'timeout'  => 2.0 ]);
    }

    public function validate ($attribute, $value, $parameters, $validator)
    {
        $response = json_decode($this->client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $this->secret,
                'response' => $value,
            ]
        ])->getBody(), true);

        return isset($response['success']) && $response['success'] === true;
    }
}