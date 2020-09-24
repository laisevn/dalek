<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddBalanceTable extends AbstractMigration
{

    public function change(): void
    {

        // create the table
        $table = $this->table('balance');
        $table->addColumn('uniqid', 'uuid')
                ->addColumn('balance', 'float')
                ->addColumn('extract', 'float')
                ->addColumn('created', 'datetime')
                ->addColumn('updated', 'datetime')
                ->create();
    }
}
