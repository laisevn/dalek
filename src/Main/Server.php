<?php declare(strict_types=1);

namespace Main;

use DI\Container;
use Slim\Factory\AppFactory;

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();