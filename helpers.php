<?php

/**
 * Global helper functions
 */

if (function_exists('env') === false) {
    /**
     * Gets the value of an environment variable.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env(string $key, mixed $default = null): mixed
    {
        return \Classes\Env::get($key, $default);
    }
}