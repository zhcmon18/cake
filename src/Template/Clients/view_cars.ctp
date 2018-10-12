<?php $loguser = $this->request->session()->read('Auth.User') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__("List Cars"), ['controller' => 'Cars', 'action' => 'index_client']) ?> </li>
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
<div class="cars index large-9 medium-8 columns content">
    <h3><?= __('Cars') ?></h3>
    <h5><?=  __('Client') . ' ' . $this->Html->link($client->name, ['controller' => 'Clients', 'action' => 'view', $client->id]) ?></h5>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('license') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client->cars as $car): ?>
            <tr>
                <td><?= $this->Html->link($car->license, ['controller' => 'Cars', 'action' => 'view', $car->id]) ?></td>
                <td><?= h($car->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $car->id]) ?>
                    
                    <?php if($loguser['status'] == 1) : ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Cars', 'action' => 'edit', $car->id]) ?>
                    <?php
                       endif
                    ?>

                    <?php 
                        if($loguser['role'] === 'admin') :?> 
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cars', 'action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
                    <?php 
                        endif 
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
