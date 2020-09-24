<?php declare(strict_types=1);

namespace Main;

$path = $_SERVER['SLIM_BASE_PATH'] ?? '';
$app->setBasePath($path);
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);
