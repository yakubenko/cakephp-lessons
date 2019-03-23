<?php
$selectBoxesOptions = ['options' => $categories, 'multiple' => 'checkbox'];

if (!empty($selectedCats)) {
    $selectBoxesOptions['value'] = $selectedCats;
}

$title = ($this->request->getParam('action') == "edit") ? __('Edit writer') : __('Add a writer');
?>

<h2><?= $title ?></h2>

<?= $this->Form->create($writer, ['type' => 'file']); ?>

<div class="row">
    <div class="col-4">
        <?= $this->Form->control('firstname', ['label' => __('Имя'), 'autocomplete' => 'off']); ?>
    </div>

    <div class="col-4">
        <?= $this->Form->control('middlename', ['label' => __('Отчество'), 'autocomplete' => 'off']); ?>
    </div>

    <div class="col-4">
        <?= $this->Form->control('lastname', ['label' => __('Фамилия'), 'autocomplete' => 'off']); ?>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <?= $this->Form->control('year_b', ['label' => __('Год рождения'), 'autocomplete' => 'off']); ?>
    </div>
    <div class="col-6">
        <?= $this->Form->control('year_d', ['label' => __('Год смерти'), 'autocomplete' => 'off']); ?>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <?= $this->Form->control('categories', $selectBoxesOptions); ?>
    </div>
    <div class="col-6">
        <?= $this->Form->control('bio', array(
            'label' => __('Краткая биография'),
            'type' => 'textarea'
        ));
        ?>
    </div>
</div>

<hr />

<div class="form-group">
    <?= $this->Form->button(__('Добавить'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Отмена'), '/writers', ['class' => 'btn btn-secondary']) ?>
</div>
<?= $this->Form->end(); ?>
