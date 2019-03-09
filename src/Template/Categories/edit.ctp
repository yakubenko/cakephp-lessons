<h2><?= __('Change category') ?></h2>

<?= $this->Form->create($category); ?>

<?= $this->Form->control('title', ['label' => __('Название категории'), 'autocomplete' => 'off']); ?>

<?= $this->Form->select('parent_id', $categories, ['empty' => '-----']); ?>

<?= $this->Form->control('description', array(
    'label' => __('Краткое описание'),
    'type' => 'textarea'
));
?>

<div class="form-group">
    <?= $this->Form->button(__('Изменить категорию'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Отмена'), '/categories', ['class' => 'btn btn-secondary']) ?>
</div>
<?= $this->Form->end(); ?>
