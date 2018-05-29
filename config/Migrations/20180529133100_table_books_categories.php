<?php

use Phinx\Migration\AbstractMigration;

class TableBooksCategories extends AbstractMigration
{
    public function up()
    {
        $bookscats = $this->table('books_categories');

        $bookscats->addColumn('book_id', 'integer', ['limit' => 10, 'null' => false])
            ->addColumn('category_id', 'integer', ['limit' => 10, 'null' => false]);

        $bookscats->save();
    }

    public function down()
    {
        $this->dropTable('book_categories');
    }
}
