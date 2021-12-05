<?php

require_once __DIR__ . '/../bootstrap.php';

use Intervention\Image\{Exception\NotReadableException, ImageManager, Image};

$imgPath = $argv[1] ?? null;

if (!empty($imgPath)) {
    try {
        $manager = new ImageManager();
        $manager->make($imgPath);
        exit(0);
    } catch (NotReadableException $e) {
        echo "The following error occurred: " . $e->getMessage();
    } catch (Throwable $e) {
        echo "A unexpected error occurred: " . $e->getMessage();
    }
}

exit(1);