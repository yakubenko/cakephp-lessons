<?php $this->assign('title', __('Все издатели')) ?>

<h2><?= __('Все издатели') ?></h2>

<p>
    <?= $this->Html->link(__('Добавить издателя'), '/publishers/add', ['class' => 'btn btn-primary']) ?>
</p>

<?php foreach ($publishers as $publisher): ?>
    <section class="publisher">
        <h5><?= $publisher->title ?></h5>
        <div>
            <?= $publisher->description; ?>
        </div>

        <div>
            <?= $this->Html->link(__('Edit'), '/publishers/edit/' . $publisher->id, ['class' => 'btn btn-default']) ?>
            <?= $this->Html->link(__('Delete'), '/publishers/delete/' . $publisher->id, ['class' => 'btn btn-danger', 'confirm' => __('Хотите ли Вы удлить запись?')]) ?>
        </div>
    </section>
<?php endforeach; ?>
