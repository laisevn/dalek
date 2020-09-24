<?php

namespace Data\Protocols;

use Domain\Models\Transaction;
use Domain\UseCase\MakeTransaction;

interface UpdateBalanceRepository
{
  public function make(String $transaction): String;
}