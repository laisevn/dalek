<?php declare(strict_types=1);

namespace Domain\UseCase;

use Domain\Models\AccountModel;

interface AddAccountModel
 /* To implement */

 /***
  * Attributes
    public function attributtes() : String;
    public function attributtes();
  */
{
    public function __contruct() : Array;
}


interface AddAccount
{
    public function add(String $account) : String;
}
