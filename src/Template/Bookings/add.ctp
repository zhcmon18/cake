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
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        
        <?php if($loguser['role'] === 'admin') :?> 
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php endif ?>
        
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('New booking for') ?> <?= $client = $clients->first() ?></legend>
        <?php
            echo $this->Form->control('car_id', ['options' => $cars]);
            echo $this->Form->control('current_km');
            echo $this->Form->control('date_service');
            echo $this->Form->control('payment_received', ['type' => 'checkbox']);
            echo $this->Form->control('description');
            echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
