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
        $requiredFields = array('name', 'cpf', 'email' , 'password', 'password_confirmation');

        foreach ($requiredFields as $field) 
        {
            if (empty($request->{'body'}->{$field}))
            {
                $response = BadRequest::bodyJson(new MissingParamError($field));
            }
        }
                
        return $response;
    }
}