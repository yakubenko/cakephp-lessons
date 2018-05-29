<?php

use Phinx\Migration\AbstractMigration;

class CreateTableCategories extends AbstractMigration
{
    public function up()
    {
        $catagories = $this->table('categories');

        $catagories->addColumn('title', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('parent_id', 'integer', ['limit' => 10, 'null' => true])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('lft', 'integer', ['null' => true])
            ->addColumn('rght', 'integer', ['null' => true])
            ->addColumn('level', 'integer', ['null' => true]);

        $catagories->save();
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
