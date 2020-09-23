<?php

namespace Data\Protocols;

use Domain\Models\AccountModel;
use Domain\UseCase\AddAccountModel;

interface AddAccountRepository
{
  public function add(String $accountData): String;
}