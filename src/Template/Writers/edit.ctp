<h2><?= __('Edit writer') ?></h2>

<?= $this->Form->create($writer, ['type' => 'file']); ?>

<?= $this->Form->control('firstname', ['label' => __('Имя'), 'autocomplete' => 'off']); ?>
<?= $this->Form->control('middlename', ['label' => __('Отчество'), 'autocomplete' => 'off']); ?>
<?= $this->Form->control('lastname', ['label' => __('Фамилия'), 'autocomplete' => 'off']); ?>
<?= $this->Form->control('year_b', ['label' => __('Год рождения'), 'autocomplete' => 'off']); ?>
<?= $this->Form->control('year_d', ['label' => __('Год смерти'), 'autocomplete' => 'off']); ?>

<div>Категории</div>
<?= $this->Form->select('categories', $categories, ['multiple' => true, 'value' => $selectedCats]); ?>

<?= $this->Form->control('bio', array(
    'label' => __('Краткая биография'),
    'type' => 'textarea'
));
?>

<div class="form-group">
    <?= $this->Form->button(__('Изменить'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Отмена'), '/writers', ['class' => 'btn btn-secondary']) ?>
</div>
<?= $this->Form->end(); ?>
