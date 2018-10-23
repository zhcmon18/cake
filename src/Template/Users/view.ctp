<?php
$loguser = $this->request->getSession()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $user->id]) ?> </li>
        
        <?php 
            if($loguser['role'] === 'admin') :?> 
                <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete the user # {0}?', $user->id)]) ?> </li>
                <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <?php 
            endif 
        ?>   
    
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= __('User') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= h($user->status ? __('Yes') : __('No')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bookings') ?></h4>
        
        <?php if (!empty($user->bookings)): ?>
        
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Client') ?></th>
                <th scope="col"><?= __('Car') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($user->bookings as $bookings): ?>
            <tr>
                <td><?= $this->Html->link(($bookings['client']->name), ['controller' => 'Clients', 'action'=> 'view', $bookings->client_id]) ?></td>
                <td><?= $this->Html->link(($bookings['car']->model . ' ' . $bookings['car']->license), ['controller' => 'Cars', 'action'=> 'view', $bookings->car_id]) ?></td>               
                <td><?= h($bookings->created) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                    
                    <?php if
                        ($loguser['role'] === 'admin') :?> 
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
