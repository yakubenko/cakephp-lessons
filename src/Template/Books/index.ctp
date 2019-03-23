<h2><?= __('All books') ?></h2>

<p>
    <?= $this->Html->link(__('Add a book'), '/books/add',
        ['class' => 'btn btn-primary']) ?>
</p>


<?php foreach ($books as $book): ?>
    <section class="publisher mb-3">
        <h5><?= $book->title ?></h5>
        <div>
            <b><?= $book->year; ?></b>

            &mdash;

            <?= $book->publisher->title; ?>
        </div>

        <div class="mb-3">
            <b>Writers:</b>
            <?php foreach ($book->writers as $writer): ?>
                <?= $writer->firstname . ' ' . $writer->middlename . ' ' . $writer->lastname ?>
            <?php endforeach; ?>
        </div>

        <div class="mb-3">
            <b>Categories:</b>
            <?php foreach ($book->categories as $category): ?>
                <?= $category->title ?>,
            <?php endforeach; ?>
        </div>

        <div>
            <?= $book->description; ?>
        </div>

        <div class="mt-3">
            <?= $this->Html->link(__('Edit'), '/books/edit/' . $book->id,
                ['class' => 'btn btn-secondary']) ?>

            <?= $this->Html->link(__('Delete'), '/books/delete/' . $book->id,
                ['class' => 'btn btn-danger', 'confirm' => __('Хотите ли Вы удалить запись?')]) ?>
        </div>
    </section>
<?php endforeach; ?>
