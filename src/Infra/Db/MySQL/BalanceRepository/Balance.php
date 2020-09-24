<?php 

namespace Infra\Db\MySQL\AccountRepository;

use Data\Protocols\UpdateBalanceRepository;

class BalanceMysqlRepository implements UpdateBalanceRepository
{
  public function make(String $transaction) : String
  {
     return 'to implement';
  } 
}
