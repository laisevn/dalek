<?php

namespace Data\UseCase;

use Data\Protocols\AddAccountRepository;
use Data\Protocols\Encrypter;
use Domain\UseCase\AddAccount;
use Infra\Criptography\EncryptAdapter;
use Infra\Db\MySQL\AccountRepository\AccountMySQLRepository;

class DBAddAccount implements AddAccount
{

    public function add(String $accountData): String
    {
        $addAccountRepository = new AccountMySQLRepository();
        $encryper = new EncryptAdapter();
        $decodedData = json_decode($accountData, true);
        $encryptedPassword = $encryper->encrypt(json_encode($decodedData['body']['password']));
        $decodedData['body']['password'] = $encryptedPassword;

        $account = $addAccountRepository->add(json_encode($decodedData));
       
        return $account;
    }
}
