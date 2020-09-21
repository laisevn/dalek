<?php

namespace Presentation\Erros;

require __DIR__ . './../../../vendor/autoload.php';

use Error;

final class InvalidParamError extends Error
{

    public function __construct(string $paramName, $code = 400)
    {
        $this->$paramName = $paramName;
        parent::__construct($message = $this->message($paramName), $code);
    }

    private function message($paramName)
    {
        return "Inavalid param:   $paramName";
    }
}
