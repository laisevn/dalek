<?php 

namespace Main\Adapter;

use Presentation\Protocols\Controller;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SlimRouteAdapter
{
  protected $controller;
  public function __construct(Controller $controller)
  {
    $this->controller = $controller;
  }
  public function adaptRoute()
  {
    return function (Request $request, Response $response) {
      $httpRequest =  ['body' => $request->getBody()];
      $httpResponse = $this->controller->handle(json_encode($httpRequest));

      $response->getStatusCode(json_decode($httpResponse)->statusCode);
      $response->getBody()->write($httpRequest);
    };
  }
}