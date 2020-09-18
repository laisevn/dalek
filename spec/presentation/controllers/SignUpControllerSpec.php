<?php

namespace spec\presentation\controllers;

use PhpSpec\ObjectBehavior;

class SignUpControllerSpec extends ObjectBehavior
{
    public function it_returns_error_if_name_is_not_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'email' => 'some-email@example.com',
                'cpf' => '98540234009',
                'password' => 1234,
                'password_confirmation' => 1234,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Missing param: name');
    }

    public function it_returns_error_if_cpf_is_not_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'name' => 'Some Name',
                'email' => 'some-email@example.com',
                'password' => 1234,
                'password_confirmation' => 1234,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Missing param: cpf');
    }
}
