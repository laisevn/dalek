<?php

namespace spec\Presentation\Controllers;

use PhpSpec\ObjectBehavior;

require './src/Presentation/Errors/MissignParamError.php';
require './src/Presentation/Helpers/HttpHelper.php';

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

    public function it_returns_error_if_email_is_not_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'name' => 'Some Name',
                'cpf' => '98540234009',
                'password' => 1234,
                'password_confirmation' => 1234,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Missing param: email');
    }

    public function it_returns_error_if_password_is_not_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'name' => 'Some Name',
                'email' => 'some-email@example.com',
                'cpf' => '98540234009',
                'password_confirmation' => 1234,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Missing param: password');
    }

    public function it_returns_error_if_passwordConfirmation_is_not_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'name' => 'Some Name',
                'email' => 'some-email@example.com',
                'cpf' => '98540234009',
                'password' => 123,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Missing param: password_confirmation');
    }
}
