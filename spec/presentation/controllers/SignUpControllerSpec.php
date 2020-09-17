<?php

namespace spec\presentation\controllers;

use PhpSpec\ObjectBehavior;
use presentation\controllers\SignUpController;

require './src/presentation/controllers/SignUpController.php';

class SignUpControllerSpec extends ObjectBehavior
{
    public function it_returns_error_if_name_not_provided()
    {
      $http_request = "body: {
      'email': 'some-email@example.com',
      'password': 1234,
      'password_confirmation': 1234,
      }";

      $response = $this->handle($http_request);
      $response->shouldHaveJsonKeyWithValue('statusCode',400);
      $response->shouldHaveJsonKeyWithValue('body','Missing param: name');
    }
}
