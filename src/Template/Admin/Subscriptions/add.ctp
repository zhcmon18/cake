<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Clients'), ['prefix' => false, 'controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Cars'), ['prefix' => false, 'controller' => 'Cars', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Bookings'), ['prefix' => false,'controller' => 'Bookings', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Promotions'), ['prefix' => false, 'controller' => 'Promotions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['prefix' => false, 'controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Tags'), ['prefix' => false, 'controller' => 'Tags', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Photos'), ['prefix' => false, 'controller' => 'Photos', 'action' => 'index']) ?></li>
<li><?=
    $this->Html->link('Section publique en JS', [
        'prefix' => false,
        'controller' => 'Subscriptions',
        'action' => 'index'
    ]);
    ?>
</li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>
<?= $this->Form->create($subscription); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Subscription']) ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
