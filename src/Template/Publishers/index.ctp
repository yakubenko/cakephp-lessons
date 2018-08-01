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
    </section>
<?php endforeach; ?>
