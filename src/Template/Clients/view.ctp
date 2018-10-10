<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>       
        
        <?php 
            if($loguser['role'] === 'admin') :?> 
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php 
            endif 
        ?>
        
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        
        <?php
            if ($loguser['status'] == 1): ?>
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add', $client->id]) ?> </li>
                <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add', $client->id]) ?> </li>
                <li><?= $this->Html->link(__('Edit Client'), ['controller' => 'Clients', 'action' => 'edit', $client->id]) ?> </li>
        <?php
            endif 
        ?>
        <?php 
            if($loguser['role'] === 'admin') :?> 
                <li><?= $this->Form->postLink(__('Delete Client'), ['controller' => 'Clients', 'action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete the client # {0}?', $client->id)]) ?> </li>
        <?php 
            endif 
        ?>  
    
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= __('Client') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($client->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($client->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bookings') ?></h4>
        <?php if (!empty($client->bookings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Created by') ?></th>
                <th scope="col"><?= __('Car') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($client->bookings as $bookings): ?>
            <tr>
                <td><?= $this->Html->link(($bookings['user']->email), ['controller' => 'Users', 'action'=> 'view', $bookings->user_id]) ?></td>
                <td><?= $this->Html->link(($bookings['car']->model . ' ' . $bookings['car']->license), ['controller' => 'Cars', 'action' => 'view', $bookings['car']->id] ) ?></td>

                <td><?= h($bookings->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                    
                    <?php
                        if ($loguser['status'] == 1 && $loguser['id'] === $bookings->user_id): ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                    <?php 
                        endif 
                    ?>
                    
                    <?php 
                        if($loguser['role'] === 'admin') :?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete the booking #{0}?', $bookings->id)]) ?>
                    <?php 
                        endif 
                    ?> 
                
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
