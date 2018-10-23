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
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        
        <?php
            if(($loguser['status'] == 1 && $loguser['id'] == $booking->user_id) || $loguser['role'] === 'admin') :?>
                <li class="heading"><?= __('Actions') ?></li>  
                <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
        <?php
            endif
        ?>
        
        <?php 
            if($loguser['role'] === 'admin') :?> 
                <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete the booking #{0}?', $booking->id)]) ?> </li>
        <?php 
            endif
        ?>
   
    </ul>
</nav>
<div class="bookings view large-9 medium-8 columns content">
    <h3><?= __('Booking') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $booking->has('user') ? $this->Html->link($booking->user->email, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $booking->has('client') ? $this->Html->link($booking->client->name, ['controller' => 'Clients', 'action' => 'view', $booking->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car') ?></th>
            <td><?= $booking->has('car') ? $this->Html->link($booking->car->model, ['controller' => 'Cars', 'action' => 'view', $booking->car->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($booking->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Km') ?></th>
            <td><?= $this->Number->format($booking->current_km) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Service') ?></th>
            <td><?= h($booking->date_service) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Received') ?></th>
            <td><?= h($booking->payment_received ? __('Yes') : __('No')); ?></td>
        </tr>
        <tr>
             <th scope="row"><?= __('Created') ?></th>
            <td><?= h($booking->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($booking->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($booking->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($booking->tags as $tags): ?>
            <tr>
                <td><?= $this->Html->link($tags->title, ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
