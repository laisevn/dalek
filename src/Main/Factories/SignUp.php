<?php declare(strict_types=1);

namespace Main\Factories;

use Presentation\Controllers\SignUpController;
use Utils\EmailValidatorAdapter;
use Data\UseCase\DBAddAccount;
use Infra\Criptography\EncryptAdapter;
use Infra\Db\MySQL\AccountRepository\AccountMySQLRepository;

function makeSignUpController(): SignUpController
{

  $emailValidatorAdapter = new EmailValidatorAdapter;
  $encryptAdapter = new EncryptAdapter();
  $accountMysqlRepository = new AccountMySQLRepository();
  $dbAddAccount = new DBAddAccount($encryptAdapter, $accountMysqlRepository);
  
  return $signUpController = new SignUpController($emailValidatorAdapter, $dbAddAccount);
}