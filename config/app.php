<?php

return [
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'services' => [
        Classes\ServiceProviders\StorageServiceProvider::class,
    ],
];