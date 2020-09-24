<?php

namespace Main\Adapter;

use Presentation\Protocols\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SlimRouteAdapter
{
    protected $controller;
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function adaptRoute(Request $request, Response $response)
    {

      $httpRequest = json_encode(['body' => $request->getQueryParams()]);
      $httpResponse = $this->controller->handle($httpRequest);
      $response->withStatus(json_decode($httpResponse, true)['statusCode']);
      $response->getBody()->write(json_decode($httpResponse, true)['body']);
      return $response;
    }
}
