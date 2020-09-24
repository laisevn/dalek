<?php

namespace Presentation\Helpers;

use Error;

function badRequest(Error $error): string
{
    return json_encode([
            'statusCode' => 400,
            'body' => $error->getMessage(),
        ]
    );
}

function success(String $data): string
{
    return json_encode([
            'statusCode' => 200,
            'body' => "Successful created: ${data}",
        ]
    );
}

