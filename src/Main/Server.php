<?php declare(strict_types=1);

namespace Main;

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();