<?php declare (strict_types = 1);

namespace presentation\controllers;

class SignUpController
{
    public function handle($http_request)
    {
        $request = json_decode($http_request);

        if (empty($request->{'body'}->{'name'})) {
            $param = 'name';
        } elseif (empty($request->{'body'}->{'cpf'})) {
            $param = 'cpf';
        }

        $data = (object) [
            'statusCode' => 400,
            'body' => "Missing param: ${param}",
        ];
        $response = json_encode($data);
        return $response;
    }
}
