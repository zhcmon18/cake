<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New booking'), ['action' => 'add', $booking->client_id]) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete booking'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
            )
        ?>
        <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('Bookings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <h5>ID: <?= h($booking->id) ?></h5>
    <h5>Created by: <?= $this->Html->link($booking['user']->email,['controller' => 'Users', 'action' => 'view', $booking->user->id]) ?> (<?= $booking->created ?>)</h5>
    <h5>Client: <?= $this->Html->link($booking['client']->name,['controller' => 'Clients', 'action' => 'view', $booking->client->id]) ?></h5>
    <h5>Car: <?= $this->Html->link($booking['car']->model,['controller' => 'Cars', 'action' => 'view', $booking->car->id]) ?></h5>
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
