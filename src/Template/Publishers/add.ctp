<h2><?= __('Add a publisher') ?></h2>

<?= $this->Form->create($publisher, ['type' => 'file']); ?>

<?= $this->Form->control('title', ['label' => __('Название издательства'), 'autocomplete' => 'off']); ?>
<?= $this->Form->control('logotype', ['label' => __('Изображение'), 'type' => 'file']); ?>

<?= $this->Form->control('description', array(
    'label' => __('Краткое описание'),
    'type' => 'textarea'
));
?>
<div class="form-group">
    <?= $this->Form->button(__('Добавить'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Отмена'), '/publishers', ['class' => 'btn btn-secondary']) ?>
</div>
<?= $this->Form->end(); ?>
