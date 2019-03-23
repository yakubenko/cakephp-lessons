<?php
$categoriesSelectOptions = ['options' => $categories, 'multiple' => 'checkbox'];
$writersSelectOptions = ['options' => $writers, 'multiple' => 'checkbox'];


if (!empty($selectedCats)) {
    $categoriesSelectOptions['value'] = $selectedCats;
}

if (!empty($selectedWriters)) {
    $writersSelectOptions['value'] = $selectedWriters;
}

list($title, $btnTitle) = ($this->request->getParam('action') == "edit")
    ?
    [__('Edit Book'), __('Edit')] :
    [__('Add a Book'), __('Add')];
?>

<h2><?= $title ?></h2>

<?= $this->Form->create($book); ?>
<div class="row">
    <div class="col-6">
        <?= $this->Form->control('title', ['label' => __('Название книги'), 'autocomplete' => 'off']); ?>
    </div>

    <div class="col-6">
        <?= $this->Form->control('year', ['label' => __('Год издания'), 'autocomplete' => 'off']); ?>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <?= $this->Form->control('publisher_id',
            ['label' => __('Издательство'), 'type' => 'select', 'options' => $publishers]); ?>
    </div>

    <div class="col-6">
    <?= $this->Form->control('description', array(
            'label' => __('Краткая информация по книге'),
            'type' => 'textarea'
        ));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-6">
    <?= $this->Form->control('categories', $categoriesSelectOptions); ?>
    </div>


    <div class="col-6">
    <?= $this->Form->control('writers', $writersSelectOptions); ?>
    </div>
</div>

<div class="form-group">
    <?= $this->Form->button($btnTitle, ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Отмена'), '/writers', ['class' => 'btn btn-secondary']) ?>
</div>
<?= $this->Form->end(); ?>
