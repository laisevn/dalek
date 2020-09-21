<?php

namespace Utils;

use Egulias\EmailValidator\EmailValidator as Validator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Presentation\Protocols\EmailValidator;

class EmailValidatorAdapter implements EmailValidator
{
    public function isValid(String $email): Bool
    {
        $validator = new Validator();
        return $validator->isValid($email, new RFCValidation());
    }
}
