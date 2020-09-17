<?php declare (strict_types = 1);

namespace presentation\controllers;

class SignUpController
{
    public function handle($argument1)
    {   
        $data =  (object) [
            'statusCode' => 400,
            'body' => 'Missing param: name',
        ];
        $response = json_encode($data);
        return $response;
    }
}
