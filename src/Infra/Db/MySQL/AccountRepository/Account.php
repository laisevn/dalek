<?php 

namespace Infra\Db\MySQL\AccountRepository;

use Data\Protocols\AddAccountRepository;
use Domain\UseCase\AddAccountModel;
use Infra\DB\MySQL\Utils\DbConnection;

class AccountMySQLRepository implements AddAccountRepository
{
  public function add(AddAccountModel $accountData): String
  {
    $database = new DbConnection();

    $dataDecoded = json_decode($accountData, true);
    $data = $database->insert('account',$dataDecoded);  
    
    $account = json_encode($database->getCollection('account'));
    return $account;
  } 
}
