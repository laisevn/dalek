<?php

namespace Infra\DB\MySQL\Utils;

use Medoo\Medoo;

class DbConnection
{
    private $database;
    private function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => $_SERVER['DB_NAME'],
            'server' => $_SERVER['DB_HOST'],
            'username' => $_SERVER['DB_USER'],
            'password' => 'root',
        ]);
    }

    public function getCollection(String $name) 
    {
        $data = $this->database->select($name, '*');
        return json_encode($data);
    }

    public function insert(String $data): String 
    {
      $dataDecoded = json_decode($data, true);
      $data = $this->database->insert('account',$dataDecoded);  
    }
}


