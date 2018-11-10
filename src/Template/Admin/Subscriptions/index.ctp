<?php
/* @var $this \Cake\View\View */
$this->extend('/Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Clients'), ['prefix' => false, 'controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Cars'), ['prefix' => false, 'controller' => 'Cars', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Bookings'), ['prefix' => false,'controller' => 'Bookings', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Subscriptions (User View)'), ['prefix' => false,'controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['prefix' => false, 'controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Tags'), ['prefix' => false, 'controller' => 'Tags', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('List Photos'), ['prefix' => false, 'controller' => 'Photos', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New subscription'), ['prefix' => false, 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($subscriptions as $subscription): ?>
        <tr>
            <td><?= h($subscription->name) ?></td>
            <td><?= h($subscription->created) ?></td>
            <td><?= h($subscription->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $subscription->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $subscription->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
