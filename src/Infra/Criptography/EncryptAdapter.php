<?php

namespace Infra\Criptography;

use Data\Protocols\Encrypter;
use Defuse\Crypto\KeyProtectedByPassword;

class EncryptAdapter implements Encrypter
{
    public function encrypt(String $value): String
    {
        $protected_key = KeyProtectedByPassword::createRandomPasswordProtectedKey($value);
        $protected_key_encoded = $protected_key->saveToAsciiSafeString();
        return $protected_key_encoded;
    }
}
