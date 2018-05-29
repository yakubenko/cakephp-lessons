<?php

use Phinx\Migration\AbstractMigration;

class CreateTableWriters extends AbstractMigration
{
    public function up()
    {
        $writers = $this->table('writers');

        $writers->addColumn('firstname', 'string', ['limit' => 64, 'null' => false])
            ->addColumn('lastname', 'string', ['limit' => 64, 'null' => false])
            ->addColumn('middlename', 'string', ['limit' => 64, 'null' => true])
            ->addColumn('photo', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('bio', 'text', ['null' => true])
            ->addColumn('year_b', 'integer', ['limit' => 4, 'null' => false])
            ->addColumn('year_d', 'integer', ['limit' => 4, 'null' => true]);

        $writers->save();
    }

    public function down()
    {
        $this->dropTable('writers');
    }
}
