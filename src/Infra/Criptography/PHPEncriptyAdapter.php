<?php

namespace Infra\Criptography;

use Data\Protocols\Encrypter;
use Defuse\Crypto\KeyProtectedByPassword;

class Criptography implements Encrypter
{
    public function encrypt(string $value): string
    {
        $protected_key = KeyProtectedByPassword::createRandomPasswordProtectedKey($value);
        $protected_key_encoded = $protected_key->saveToAsciiSafeString();
        return $protected_key_encoded;
    }
}
