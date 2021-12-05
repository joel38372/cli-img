<?php

namespace Classes;

use Exception;

class Config
{
    const CONFIG_PATH = DIRECTORY_SEPARATOR . 'config';

    private array $config;

    /**
     * Config constructor.
     *
     * @param string $name Name of config file
     * @param App $app The current application
     * @throws Exception Config failed to be processed
     */
    public function __construct(private string $name, private App $app)
    {
        $this->load($this->app->root() . self::CONFIG_PATH . DIRECTORY_SEPARATOR . $this->name. '.php');
    }

    /**
     * Load the configuration array.
     *
     * @param string $path The path to (including filename) to config file
     * @return void
     * @throws Exception Failed to read config file
     */
    private function load(string $path): void
    {
        if (!file_exists($path)) {
            throw new Exception("Expected config file $path is missing or can't be accessed.");
        }

        $this->config = require $path;
    }

    /**
     * Using dot notation, gets a certain config value or group.
     *
     * @param string $key The config key/index, nested levels can be accessed using . notation
     * @return mixed The values held in config
     */
    public function get(string $key): mixed
    {
        $parts = explode('.', $key);
        $result = $this->config;

        foreach ($parts as $part) {
           $result = $result[$part] ?? null;
        }

        return $result;
    }
}