<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $subscription->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]
    )
    ?>
</li>
<li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
        $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $subscription->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]
        )
        ?>
    </li>
    <li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($subscription); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Subscription']) ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
