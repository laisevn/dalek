<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddAccountTable extends AbstractMigration
{

    public function change(): void
    {

        // create the table
        $table = $this->table('accounts');
        $table->addColumn('name', 'string', ['limit' => 100])
                ->addColumn('email', 'string')
                ->addColumn('cpf', 'string', ['limit' => 20])
                ->addColumn('cnpj', 'string',['limit' => 20])
                ->addColumn('password', 'string')
                ->addColumn('password_confirmation', 'string')
                ->addColumn('created', 'datetime')
                ->addColumn('updated', 'datetime')
                ->addIndex(['email', 'cpf', 'cnpj'], ['unique' => true])
                ->create();
    }
}
