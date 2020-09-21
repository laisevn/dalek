<?php

namespace Presentation\Protocols;

interface EmailValidator
{
    public function isValid(String $email): Bool;
}
