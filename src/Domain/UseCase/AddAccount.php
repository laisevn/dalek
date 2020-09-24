<?php declare (strict_types = 1);

namespace Domain\UseCase;

interface AddAccountModel
/* To implement */

/***
 * Attributes
public function attributtes() : String;
public function attributtes();
 */

{
    public function __contruct(): array;
}

interface AddAccount
{
    public function add(String $account): String;
}
