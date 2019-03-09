<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Каталог книг</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <?= $this->Html->link(__('Home'), '/', ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__('Books'), '/books', ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__('Writers'), '/writers', ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__('Categories'), '/categories', ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__('Publishers'), '/publishers', ['class' => 'nav-link']) ?>
        </li>
    </ul>
</div>
</nav>
