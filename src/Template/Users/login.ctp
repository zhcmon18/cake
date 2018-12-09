<h1><?= __('Login') ?></h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('username', ['label' => __('Email')]) ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
