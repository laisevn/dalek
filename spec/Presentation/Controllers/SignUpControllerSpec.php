<?php

namespace spec\Presentation\Controllers;

use Slim\Psr7\Request;

require __DIR__ . './../../../vendor/autoload.php';
require './src/Presentation/Errors/MissignParamError.php';
require './src/Presentation/Errors/InvalidParamError.php';
require './src/Presentation/Helpers/HttpHelper.php';
require './src/Presentation/Protocols/Controller.php';
require './src/Presentation/Protocols/EmailValidator.php';

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

    public function it_returns_error_if_password_confirmation_is_not_provided()
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

    public function it_returns_error_if_invalid_email_is_provided()
    {

        $http_request = json_encode((object) [
            'body' => [
                'name' => 'Some Name',
                'email' => 'invalid_email@example.com',
                'cpf' => '98540234009',
                'password' => 123,
                'password_confirmation' => 1234,
            ],
        ]);

        $response = $this->handle($http_request);
        $response->shouldHaveJsonKeyWithValue('statusCode', 400);
        $response->shouldHaveJsonKeyWithValue('body', 'Inavalid param: email');
    }
}
