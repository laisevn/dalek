<?php declare(strict_types=1);

namespace Main;

use Dotenv\Dotenv;

$baseDir = __DIR__ . '/../../';

$dotenv = Dotenv::createImmutable($baseDir);
if (file_exists($baseDir . '.env')) {
    $dotenv->load();
}
