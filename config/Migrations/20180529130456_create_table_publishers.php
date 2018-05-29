<?php

use Phinx\Migration\AbstractMigration;

class CreateTablePublishers extends AbstractMigration
{
    public function up()
    {
        $publishers = $this->table('publishers');

        $publishers->addColumn('title', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('logotype', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('description', 'text', ['null' => true]);

        $publishers->save();
    }

    public function down()
    {
        $this->dropTable('publishers');
    }
}
