<?php

namespace Classes;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    private static Logger $log;

    /**
     * Load up the monolog logger.
     *
     * @param string $path Path to write apps log file
     * @return void
     */
    public static function load(string $path): void
    {
        if (empty(static::$log)) {
            static::$log = new Logger('App');
            static::$log->pushHandler(new StreamHandler($path . '/app.log'));
        }
    }

    /**
     * Log a message via the logger.
     *
     * @param string $level The severity level of the message
     * @param string $message The message to be logged
     * @param array $context Additional context for the message
     * @return void
     */
    public static function log(string $level, string $message, array $context = [])
    {
        static::$log->log($level, $message, $context);
    }
}