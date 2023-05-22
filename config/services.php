<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '202672915873911',  //client face của bạn
        'client_secret' => '0321be3c147c27f536ed56a3846f07f0',  //client app service face của bạn
        'redirect' => 'https://lavishop.com/laravel/online-shop/admin/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '911719188698-6m2utka0lna0j7q0iiu9rtt5i23p0l32.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://lavishop.com/laravel/online-shop/google/callback'
    ],


];
