<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Clients'), ['prefix' => false, 'controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Cars'), ['prefix' => false, 'controller' => 'Cars', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Bookings'), ['prefix' => false,'controller' => 'Bookings', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['prefix' => false, 'controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Promotions'), ['prefix' => false, 'controller' => 'Promotions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?> </li>
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
<hr>
<li><?= $this->Html->link(__('New Subscription'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('Edit Subscription'), ['action' => 'edit', $subscription->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Subscription'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?> </li>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($subscription->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($subscription->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($subscription->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($subscription->modified) ?></td>
        </tr>
    </table>
</div>

