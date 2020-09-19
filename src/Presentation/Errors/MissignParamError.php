<?php

namespace Presentation\Erros;

require __DIR__ . './../../../vendor/autoload.php';

use Error;

final class MissingParamError extends Error
{
  
  public function __construct(string $paramName, $code = 400) 
  {
    $this->$paramName = $paramName;
    parent::__construct($message = $this->message($paramName), $code);
  }

  private function message($paramName)
  {
    return "Missing param: $paramName";
  }
}
