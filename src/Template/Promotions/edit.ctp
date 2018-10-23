<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $promotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Subscriptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Edit Promotion') ?></legend>
        <?php
            echo $this->Form->control('subscription_id', ['options' => $subscriptions, 'empty' => true]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
