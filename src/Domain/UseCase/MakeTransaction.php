<?php declare (strict_types = 1);

namespace Domain\UseCase;

interface UpdateTransactionBalance
{
    public function __contruct(): string;
}

interface MakeTransaction
{
    public function make(String $account): String;
}
