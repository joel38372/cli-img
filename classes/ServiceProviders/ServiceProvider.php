<?php

namespace Classes\ServiceProviders;

use Classes\{App, Config};
use Classes\Providers\Provider;
use Exception;

abstract class ServiceProvider implements ServiceProviderContract
{
    private Config $config;

    /**
     * Service provider constructor.
     *
     * @param App $app
     * @throws Exception
     */
    public function __construct(private App $app)
    {
        $this->config = new Config($this->name(), $this->app);
    }

    /**
     * Get the default provider.
     *
     * @return Provider Default provider
     * @throws Exception Failed to resolve the default provider
     */
    public function getDefaultProvider(): Provider
    {
        $provider = $this->config->get('providers.' . $this->config->get('default') . '.namespace');

        if (class_exists($provider)) {
            return new $provider($this->app, $this->config);
        }

        throw new Exception($this->name() . 'service provider could not resolve its default provider');
    }
}