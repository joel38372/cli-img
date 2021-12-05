<?php

namespace Classes\Providers\Storage;

use Classes\{App, Config, Providers\Provider};
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\UnableToReadFile;

class FilesystemStorageProvider extends Provider implements StorageProvider
{
    private Filesystem $filesystem;

    /**
     * Create an instance of Filesystem Storage Provider.
     *
     * @param App $app The current application
     * @param Config $config Related provider configuration
     */
    public function __construct(private App $app, private Config $config)
    {
        $adapter = new LocalFilesystemAdapter(
            $this->app->root() . $this->config->get('providers.filesystem.root')
        );

        $this->filesystem = new Filesystem($adapter);
    }

    /**
     * Read contents of file from filesystem.
     *
     * @param string $path The path of the file
     * @return string
     * @throws UnableToReadFile
     * @throws FilesystemException
     */
    public function get(string $path): string
    {
        return $this->filesystem->read($path);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $path): void
    {
        $this->filesystem->delete($path);
    }

    /**
     * @inheritDoc
     */
    public function save(string $path, string $filename, mixed $contents): void
    {
        $this->filesystem->write($path . $filename, $contents);
    }
}