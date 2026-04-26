<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Would you like the install button to appear on all pages?
      Set true/false
    |--------------------------------------------------------------------------
    */

    'install-button' => true,

    /*
    |--------------------------------------------------------------------------
    | PWA Manifest Configuration
    |--------------------------------------------------------------------------
    |  php artisan erag:update-manifest
    */

    'manifest' => [
        'name' => 'Route To Page',
        'short_name' => 'Route To Page',
        'background_color' => '#fff7ed',
        'display' => 'fullscreen',
        'description' => 'Quickly share urls, files and more!',
        'theme_color' => '#c44700',
        'icons' => [
            [
                'src' => 'logo.png',
                'sizes' => '512x512',
                'type' => 'image/png',
                'purpose' => 'any maskable',
            ],
        ],
        "share_target" => [
            "action" => "/route",
            "method" => "POST",
            "enctype" => "multipart/form-data",
            "params" => [
                "url" => "input",
                "files" => [
                    [
                        "name" => "file",
                        "accept" => ["*/*"]
                    ]
                ]
            ]
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Configuration
    |--------------------------------------------------------------------------
    | Toggles the application's debug mode based on the environment variable
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Livewire Integration
    |--------------------------------------------------------------------------
    | Set to true if you're using Livewire in your application to enable
    | Livewire-specific PWA optimizations or features.
    */

    'livewire-app' => false,
];
