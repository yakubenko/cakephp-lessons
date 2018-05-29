<?php

use Phinx\Migration\AbstractMigration;

class CreateTableBooks extends AbstractMigration
{

    public function up()
    {
        $books = $this->table('books');

        $books->addColumn('publisher_id', 'integer', ['limit'=>5, 'null' => false])
        ->addColumn('uid', 'string', ['limit' => 64, 'null' => false])
        ->addColumn('title', 'string', ['limit' => 150, 'null' => false])
        ->addColumn('cover', 'string', ['limit' => 100, 'null' => true])
        ->addColumn('description', 'text', ['null' => true])
        ->addColumn('year', 'integer', ['limit' => 4, 'null' => true]);

        $books->save();
    }

    public function down()
    {
        $this->dropTable('books');
    }
}
