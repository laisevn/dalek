<?php

namespace Presentation\Helpers;

use Error;

final class BadRequest
{
    private $error;

    public static function bodyJson(Error $error): string
    {
        return json_encode(
            (object) [
                'statusCode' => 400,
                'body' => $error->getMessage(),
            ]
        );
    }
}
