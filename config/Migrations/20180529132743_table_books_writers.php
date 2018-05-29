<?php

use Phinx\Migration\AbstractMigration;

class TableBooksWriters extends AbstractMigration
{
    public function up()
    {
        $bookswriters = $this->table('books_writers');

        $bookswriters->addColumn('book_id', 'integer', ['limit' => 10, 'null' => false])
            ->addColumn('writer_id', 'integer', ['limit' => 10, 'null' => false]);

        $bookswriters->save();
    }

    public function down()
    {
        $this->dropTable('book_writers');
    }
}
