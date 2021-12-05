<?php

return [
    'default' => env('STORAGE_PROVIDER', 'filesystem'),
    'providers' => [
        'filesystem' => [
            'root' => '/storage',
            'namespace' => \Classes\Providers\Storage\FilesystemStorageProvider::class,
        ],
    ],
];