<?php

namespace Domain\UseCase;

use Domain\Models\AccountModel;

interface AddAccountModel

{
    public function __construc(String $data);
}

interface AddAccount
{
    public function add(AddAccountModel $account);
}
