<?php

namespace Presentation\Erros;

require __DIR__ . './../../../vendor/autoload.php';

use Error;

final class MissingParamError extends Error
{
    public function __construct()
    {
        parent::__construct(
            $message = $this->message('An unexpected error has occurred. Please try again later.'),
            $code = 500
        );
    }
}
