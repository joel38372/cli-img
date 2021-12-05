<?php

namespace Classes;

use Classes\Providers\Storage\StorageProvider;
use Classes\ServiceProviders\ServiceProvider;
use Exception;

class App
{
    private Config $config;
    private array $serviceProviders;

    /**
     * App conductor.
     *
     * @param string $root Root path of the application
     * @throws Exception The app can't be created
     */
    public function __construct(private string $root)
    {
        $this->config = new Config('app', $this);

        if ($this->config->get('debug') === 'true') {
            // Show error when in debug mode
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }

        $this->loadServiceProviders();
    }

    /**
     * Resolves all known service providers.
     *
     * @return void
     * @throws Exception If a service provider failed to resolve
     */
    private function loadServiceProviders(): void
    {
        $serviceProviderNamespaces = $this->config->get('services');

        if (!empty($serviceProviderNamespaces)) {
            foreach ($serviceProviderNamespaces as $serviceProviderNamespace) {
                $serviceProvider = new $serviceProviderNamespace($this);

                if ($serviceProvider instanceof ServiceProvider) {
                    $this->serviceProviders[$serviceProvider->name()] = $serviceProvider->getDefaultProvider();
                }
            }
        }
    }

    /**
     * Get the applications root path.
     *
     * @return string Apps root path
     */
    public function root(): string
    {
        return $this->root;
    }

    /**
     * Get the default storage provider.
     *
     * @return StorageProvider Default storage provider
     */
    public function storage(): StorageProvider
    {
        return $this->serviceProviders['storage'];
    }

    /**
     * Is the application in production mode.
     *
     * @return bool Is in production mode
     */
    public function isProduction(): bool
    {
        return in_array($this->config->get('env'), ['prod' , 'production']);
    }

    /**
     * Is the application in development mode.
     *
     * @return bool Is in development mode
     */
    public function isDevelopment(): bool
    {
        return in_array($this->config->get('env'), ['dev' , 'development']);
    }

    /**
     * Is the application in testing mode.
     *
     * @return bool Is in testing mode
     */
    public function isTesting(): bool
    {
        return in_array($this->config->get('env'), ['test' , 'testing']);
    }

}