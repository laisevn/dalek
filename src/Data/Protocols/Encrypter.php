<?php 

namespace Data\Protocols;

interface Encrypter 
{
  public function encrypt(String $value): String;
}