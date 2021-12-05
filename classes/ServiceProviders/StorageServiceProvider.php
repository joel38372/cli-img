<?php

namespace Classes\ServiceProviders;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'storage';
    }
}