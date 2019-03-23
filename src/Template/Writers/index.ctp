<?php $this->assign('title', __('All writers')) ?>

<h2><?= __('All writers') ?></h2>

<p class="mb-4">
    <?= $this->Html->link(__('Add a writer'), '/writers/add', ['class' => 'btn btn-primary']) ?>
</p>

<?php foreach ($writers as $writer): ?>
    <section class="publisher mb-3">
        <h5><?= $writer->firstname . ' ' . $writer->middlename . ' ' . $writer->lastname ?></h5>
        <div>
            <?= $writer->year_b . ' - ' . $writer->year_d; ?>
        </div>

        <div>
            <?= $writer->bio; ?>
        </div>

        <div class="mt-3">
            <?= $this->Html->link(__('Edit'), '/writers/edit/' . $writer->id,
                ['class' => 'btn btn-secondary']) ?>

            <?= $this->Html->link(__('Delete'), '/writers/delete/' . $writer->id,
                ['class' => 'btn btn-danger', 'confirm' => __('Хотите ли Вы удалить запись?')]) ?>
        </div>
    </section>
<?php endforeach; ?>
