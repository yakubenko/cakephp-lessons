<?php $this->assign('title', __('All writers')) ?>

<h2><?= __('All writers') ?></h2>

<p>
    <?= $this->Html->link(__('Add a writer'), '/writers/add', ['class' => 'btn btn-primary']) ?>
</p>

<?php foreach ($writers as $writer): ?>
    <section class="publisher">
        <h5><?= $writer->firstname . $writer->middlename . $writer->lastname ?></h5>
        <div>
            <?= $writer->year_b . ' - ' . $writer->year_d; ?>
        </div>

        <div>
            <?= $writer->bio; ?>
        </div>

        <div>
            <?= $this->Html->link(__('Edit'), '/writers/edit/' . $writer->id, ['class' => 'btn btn-default']) ?>
            <?= $this->Html->link(__('Delete'), '/writers/delete/' . $writer->id, ['class' => 'btn btn-danger', 'confirm' => __('Хотите ли Вы удлить запись?')]) ?>
        </div>
    </section>
<?php endforeach; ?>
