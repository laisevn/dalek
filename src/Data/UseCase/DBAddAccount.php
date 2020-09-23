<?php

namespace Data\UseCase;

use Data\Protocols\AddAccountRepository;
use Data\Protocols\Encrypter;
use Domain\Models\AccountModel;
use Domain\UseCase\AddAccount;
use Domain\UseCase\AddAccountModel;

class DBAddAccount implements AddAccount
{
    private $encrypter;
    private $addAccountRepository;

    private function __constructor(
      Encrypter $encrypter, 
      AddAccountRepository $addAccountRepository
    )
    {
      $this->encrypter = $encrypter;
      $this->addAccountRepository = $addAccountRepository;
    }
    public function add(String $accountData): String
    {
        // $encryptedPassword = $this->encrypter->encrypt($accountData->password);
        // $accountData->password = $encryptedPassword;  
        // $account = $this->addAccountRepository.add($accountData);
        // return $account;
    }
}
