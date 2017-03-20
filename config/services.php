<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
'facebook' => [ //can be changed to any provider
    'client_id' => '183633855472891
',
    'client_secret' => '17b4e75861baae21bc41b8a5701a6158',
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],


    'google' => [ //can be changed to any provider
    'client_id' => '747493452423-at70tg9552urptr92so03l678b73ai3m.apps.googleusercontent.com',
    'client_secret' => 'xoFc8Ua9GxqUqVpTD_Hzq-6K',
    'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
