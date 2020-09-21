<?php declare(strict_types=1);

namespace Main;

use DI\NotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}',
    function (Request $request): void {
        throw new NotFoundException($request);
    }
);