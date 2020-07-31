<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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
    // google login
     //'google' => [
     //    'client_id' => '721824431709-40tsn2d2bqi27gjokjj46kodm2fulo6s.apps.googleusercontent.com',
     //    'client_secret' => 'GFQOiVZ22QFiZESiRkvTGM50',
     //    'redirect' => 'https://voice2teach.net/auth/google/callback',
     //],
    'google' => [
        'client_id' => '22783882800-75ev30ra8e2o3nsog36d2cu1lrp5urpl.apps.googleusercontent.com',
        'client_secret' => 'z93-4dwI45HsFWjpvke--fr-',
        'redirect' => 'https://voice2teach.net/auth/google/callback',
    ],

];
