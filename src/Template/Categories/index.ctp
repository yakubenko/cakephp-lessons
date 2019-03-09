<h1><?= __('All categories'); ?></h1>

<p>
    <?= $this->Html->link(__('Add a category'), '/categories/add'); ?>
</p>

<div class="mt-2">
    <ul class="list-group">
        <?php foreach ($categories as $k => $category): ?>
        <li class="list-group-item">
            <div><?= $category ?></div>
            <div>
                <?= $this->Html->link(__('Edit category'), '/categories/edit/' . $k, ['class' => 'btn btn-default btn-sm']); ?>
                <?= $this->Html->link(__('Delete category'), '/categories/delete/' . $k, ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Хотите ли Вы удлить запись?')]); ?>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
