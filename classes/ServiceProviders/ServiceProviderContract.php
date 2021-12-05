<?php

namespace Classes\ServiceProviders;

use Classes\Providers\Provider;
use Throwable;

interface ServiceProviderContract
{
    /**
     * Get the name of the service provider.
     *
     * @return string Service provider name
     */
    public function name(): string;

    /**¬
     * Get the default provider.
     *
     * @return Provider Default provider
     * @throws Throwable Failed to resolve the default provider
     */
    public function getDefaultProvider(): Provider;
}