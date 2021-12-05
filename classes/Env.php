<?php

namespace Classes;

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Dotenv\Exception\{FormatException, PathException};

class Env
{
    /**
     * Load in the .env file and save options to $_SERVER and $_ENV
     *
     * @param string $root The path to .env file, usually the projects root
     * @return void
     */
    public static function load(string $root): void
    {
        try {
            $dotenv = new Dotenv();
            $dotenv->load($root . '/.env');
        } catch (FormatException $e) {
            Log::log('error', 'A syntax error exists with .env file: ' . $e->getMessage());
        } catch (PathException $e) {
            Log::log('error', '.env file can\'t be found: ' . $e->getMessage());
        }
    }

    /**
     * Get a env variable.
     *
     * @param string $key The name of the env variable
     * @param mixed $default If the env does not exist a default value
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}