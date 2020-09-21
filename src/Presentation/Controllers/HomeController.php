<?php declare (strict_types = 1);

namespace Presentation\Controllers;

use Pimple\Psr11\Container;
use Presentation\Helpers\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HomeController
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getHelp(Request $request, Response $response): Response
    {
        $message = [
            'api' => $_SERVER['API_NAME'],
            'version' => $_SERVER['API_VERSION'],
            'timestamp' => time(),
        ];

        return JsonResponse::withJson($response, json_encode($message), 200);
    }
}
