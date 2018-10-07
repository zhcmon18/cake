<?php
$loguser = $this->request->getSession()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        
        <?php if($loguser['role'] === 'admin') :?> 
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php endif ?>
        
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Files', 'action' => 'index']) ?></li>
          
        <?php if($loguser['role'] === 'admin') :?> 
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete the booking #{0}?', $booking->id)]) ?> </li>
        <? endif?>
    
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <h6><?= __('Created by:')?> <?= $this->Html->link($booking['user']->email,['controller' => 'Users', 'action' => 'view', $booking->user->id]) ?> (<?= $booking->created ?>)</h6>
    <h6><?= __('Client')?> <?= $this->Html->link($booking['client']->name,['controller' => 'Clients', 'action' => 'view', $booking->client->id]) ?></h6>
    <h6><?= __('Car:')?> <?= $this->Html->link(($booking['car']->model . ' ' . $booking['car']->license), ['controller' => 'Cars', 'action' => 'view', $booking->car->id]) ?></h6>
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>
        <?php
            echo $this->Form->control('current_km');
            echo $this->Form->date('date_service');
            echo $this->Form->control('payment_received');
            echo $this->Form->control('description');
            echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
