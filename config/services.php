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

    'facebook' => [
        'client_id' => '4881118921926580',
        'client_secret' => '85b26727dd4c663cb06a297ecce2e580',
        'redirect' => 'https://vietour.biz/auth/facebook/callback',
    ],

    'google' => [
        "client_id" => "1052887775453-ib34odq54d6t85pu5u38pksa654vscgs.apps.googleusercontent.com",
        "project_id" => "vietour-322906",
        "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
        "token_uri" => "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
        "client_secret" => "ylFF7MhMF4_2yH2NIKgYbZef",
        "redirect_uris" => [
            "https://vietour.biz/auth/google/callback"
        ],
        'redirect' => 'https://vietour.biz/auth/google/callback',
    ],

];
