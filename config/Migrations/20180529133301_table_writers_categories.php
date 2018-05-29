<?php

use Phinx\Migration\AbstractMigration;

class TableWritersCategories extends AbstractMigration
{
    public function up()
    {
        $writerscats = $this->table('writers_categories');

        $writerscats->addColumn('writer_id', 'integer', ['limit' => 10, 'null' => false])
            ->addColumn('category_id', 'integer', ['limit' => 10, 'null' => false]);

        $writerscats->save();
    }

    public function down()
    {
        $this->dropTable('writers_categories');
    }
}
