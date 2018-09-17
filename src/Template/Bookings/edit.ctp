<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>        
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li class="heading"><?= __('Actions') ?></li>       
        <li><?= $this->Form->postLink(
                __('Delete Booking'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete the booking #{0}?', $booking->id)]
            )
        ?>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <h5>#: <?= h($booking->id) ?></h5>
    <h5><?= __('Created by:')?> <?= $this->Html->link($booking['user']->email,['controller' => 'Users', 'action' => 'view', $booking->user->id]) ?> (<?= $booking->created ?>)</h5>
    <h5><?= __('Client')?> <?= $this->Html->link($booking['client']->name,['controller' => 'Clients', 'action' => 'view', $booking->client->id]) ?></h5>
    <h5><?= __('Car:')?> <?= $this->Html->link(($booking['car']->model . ' ' . $booking['car']->license), ['controller' => 'Cars', 'action' => 'view', $booking->car->id]) ?></h5>
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>
        <?php
            echo $this->Form->control('current_km');
            echo $this->Form->control('date_service');
            echo $this->Form->control('payment_received');
            echo $this->Form->control('description');
            echo $this->Form->control('tag_string', ['type' => 'text']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
