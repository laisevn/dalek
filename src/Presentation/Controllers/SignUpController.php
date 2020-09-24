<?php declare (strict_types = 1);

namespace Presentation\Controllers;

require __DIR__ . './../../../vendor/autoload.php';

use Domain\UseCase\AddAccount;
use Infra\Criptography\EncryptAdapter;
use Presentation\Erros\InvalidParamError;
use Presentation\Erros\MissingParamError;
use Presentation\Protocols\Controller;
use Presentation\Protocols\EmailValidator;
use function Presentation\Helpers\badRequest;
use function Presentation\Helpers\success;


class SignUpController implements Controller
{
    private $emailValidator;
    private $addAccount;

    public function __construct(EmailValidator $emailValidator, AddAccount $addAccount)
    {
        $this->emailValidator = $emailValidator;
        $this->addAccount = $addAccount;
    }

    public function handle($request): String
    {

        $request = json_decode($request, true);
        $requiredFields = array('name', 'cpf', 'email', 'password', 'password_confirmation');

        foreach ($requiredFields as $field) {
            if (empty($request['body']['{$field}'])) {
                $response = badRequest(new MissingParamError($field));
            }
        }

        new EncryptAdapter($request['body']['"passeord"']);
        $isValid = $this->emailValidator->isValid($request['body']['"email"']);

        if ($isValid == false) {
            return $response = badRequest(new InvalidParamError('email'));
        } 

        $this->addAccount->add(json_encode($request));
        return success(json_encode($request));
    }
}
