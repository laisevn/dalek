<?php

namespace Data\UseCase;

use Data\Protocols\AddAccountRepository;
use Data\Protocols\Encrypter;
use Domain\UseCase\AddAccount;

class DBAddAccount implements AddAccount
{
    private $encrypter;
    private $addAccountRepository;

    public function __constructor(Encrypter $encrypter, AddAccountRepository $addAccountRepository) 
    {
        $this->encrypter = $encrypter;
        $this->addAccountRepository = $addAccountRepository;
    }

    public function add(String $accountData): String
    {
        $decodedData = json_decode($accountData, true);
        $encryptedPassword = $this->encrypter->encrypt($decodedData->password);
        $decodedData->password = $encryptedPassword;
    
        $account = $this->addAccountRepository->add(json_encode($decodedData));
       
        return $account;
    }
}
