<?php declare (strict_types = 1);

namespace Presentation\Controllers;

require __DIR__ . './../../../vendor/autoload.php';

use BadRequest;
use Presentation\Erros\MissingParamError;

class SignUpController 
{

    public function handle($http_request)
    {
        $request = json_decode($http_request);

        if (empty($request->{'body'}->{'name'})) {
            $response = BadRequest::bodyJson(new MissingParamError('name'));
        } elseif (empty($request->{'body'}->{'cpf'})) {
            $response = BadRequest::bodyJson(new MissingParamError('cpf'));
        }
                
        return $response;
    }
}