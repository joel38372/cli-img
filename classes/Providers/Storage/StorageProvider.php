<?php

namespace Classes\Providers\Storage;

use Classes\{App, Config};
use Throwable;

interface StorageProvider
{

    /**
     * Storage provider constructors must accept the following params.
     *
     * @param App $app The current application
     * @param Config $config Related storage provider configuration
     */
    public function __construct(App $app, Config $config);

    /**
     * Saves a resource to storage.
     *
     * @param string $path The path to store the file (full or relative)
     * @param string $filename The name of the file to be created including extension
     * @param string $contents The contents of the file to be saved
     * @return void
     * @throws Throwable When the creation of the file fails
     */
    public function save(string $path, string $filename, string $contents): void;

    /**
     * Removes a resource from storage.
     *
     * @param string $path The path to the file to remove (full or relative) must also include filename
     * @return void
     * @throws Throwable If the resource can't be deleted
     */
    public function delete(string $path): void;

    /**
     * Fetches a resource from storage.
     *
     * @param string $path The path to the file to read (full or relative) including filename
     * @return mixed
     * @throws Throwable The resource could not be read
     */
    public function get(string $path): mixed;
}