<?php

use Nette\Utils\Random;
use Phinx\Seed\AbstractSeed;


class BalanceSeeder extends AbstractSeed
{

    public function run()
    {
        $data = [
            [
                'uniqid' => md5('maria' || 'dobairro'),
                'balance' => 667.8,
                'extract' => 667.8,
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            ],[
                'uniqid' => md5( 'gerald'|| 'rivia'),
                'balance' =>  3338.19,
                'extract' => 3338.19,
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('balance');
        $posts->insert($data)
              ->saveData();
    }
}
