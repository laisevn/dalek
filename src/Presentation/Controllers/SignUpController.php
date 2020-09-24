<?php declare (strict_types = 1);

namespace Presentation\Controllers;

require __DIR__ . './../../../vendor/autoload.php';

use Domain\UseCase\AddAccount;
use Presentation\Erros\InvalidParamError;
use Presentation\Erros\MissingParamError;
use Presentation\Helpers\BadRequest;
use Presentation\Protocols\Controller;
use Presentation\Protocols\EmailValidator;

class SignUpController implements Controller
{
    private $emailValidator;

    public function __construct(EmailValidator $emailValidator, AddAccount $addAccount)
    {
        $this->emailValidator = $emailValidator;
        $this->addAccount = $addAccount;
    }

    public function handle($request)
    {

        $request = json_decode($request);
        $requiredFields = array('name', 'cpf', 'email', 'password', 'password_confirmation');

        foreach ($requiredFields as $field) {
            if (empty($request->{'body'}->{$field})) {
                $response = BadRequest::bodyJson(new MissingParamError($field));
            }
        }
        
        return $response;
    }
}
