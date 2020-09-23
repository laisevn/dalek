<?php


use Phinx\Seed\AbstractSeed;

class AccountSeeder extends AbstractSeed
{

    public function run()
    {
        $data = [
            [
                'name' => 'Laise',
                'email' => 'laise@example.com',
                'cpf' => '123004321',
                'cnpj' => '1223212323',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            ],[
                'name' => 'Jessica Jones',
                'email' => 'jessica@example.com',
                'cpf' => '123004322',
                'cnpj' => '1223212322',
                'password' => '12345password',
                'password_confirmation' => '12345password',
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('accounts');
        $posts->insert($data)
              ->saveData();
    }
}
