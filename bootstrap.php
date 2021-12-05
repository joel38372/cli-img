<?php

require_once 'vendor/autoload.php';

\Classes\Env::load(__DIR__);
\Classes\Log::load(__DIR__);

require __DIR__ . '/helpers.php';

try {
    $app = new \Classes\App(__DIR__);
} catch (Exception $e) {
    error_log($e->getMessage(), LOG_CRIT);
    exit(500);
}