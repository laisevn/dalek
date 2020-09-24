<?php

namespace Infra\DB\MySQL\Utils;

use Medoo\Medoo;
use ParagonIE\EasyDB\Factory;
use DI\Container;

class MysqlConnection
{
    private $database;
    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'payment_api',
            'server' => 'mysql',
            'username' => 'root',
            'password' => '',
        ]);
    }

    public function getCollection(String $name)
    {
        $data = $this->database->select($name, '*');
        return json_encode($data);
    }

    public function insert(String $table, String $data): String
    {
        $dataDecoded = json_decode($data, true);

        var_dump($dataDecoded);

        $data = $this->database->insert($table, [
            "name" => $dataDecoded['body']['"name"'],
            "cpf" => $dataDecoded['body']['"cpf"'],
            "cnpj" => $dataDecoded['body']['"cnpj"'],
            "email" =>$dataDecoded['body']['"email"'],
            "password" => $dataDecoded['body']['"password"'],
        ]);
        return json_encode($this->database->select($table, '*', [
            'id' => $this->database->id()   
        ]));
    }

    public function update(String $data): String
    {
        /* To implement */
        return $data;
    }
}
