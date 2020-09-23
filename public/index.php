<?php declare(strict_types=1);


require __DIR__ . './../vendor/autoload.php';
require __DIR__ . './../src/Main/Server.php';
require __DIR__ . './../src/Main/DotEnv.php';
require __DIR__ . './../src/Main/NotFound.php';
require __DIR__ . './../src/routes.php';

$app->run();

 