<?php declare(strict_types=1);

namespace presentation\controllers;

use Fig\Http\Message\StatusCodeInterface;

final class SignUpController
{
    public function handle($argument1)
    {

      $app = new \Slim\Psr7\Response(StatusCodeInterface::STATUS_BAD_REQUEST);
      return $app;

    }
}
