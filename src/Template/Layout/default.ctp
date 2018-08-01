<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('styles') ?>
</head>
<body>
    <?= $this->element('navigation') ?>
    <div class="container app">
        <div class="row">
            <div class="col-md-12">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <?= $this->Html->script('scripts'); ?>
</body>
</html>
