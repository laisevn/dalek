<?php 

namespace Infra\Db\MySQL\AccountRepository;

use Data\Protocols\AddAccountRepository;
use Infra\DB\MySQL\Utils\MysqlConnection;

class AccountMySQLRepository implements AddAccountRepository
{
  public function add(String $accountData) : String
  {
    $databaseConnection = new MysqlConnection();
    $data = $databaseConnection->insert('accounts', $accountData);

    return $data;
  } 
}
