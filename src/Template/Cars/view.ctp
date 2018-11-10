<?php
$loguser = $this->request->getSession()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Subscriptions (Monopage)'), ['controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
        <?php if($loguser['role'] === 'admin') :?>
            <li><?= $this->Html->link(__('List Subscriptions (View Admin)'), ['prefix' => 'admin', 'controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php endif?>
        
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        
        <?php 
            if($loguser['status'] == 1) :?>
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id]) ?> </li>
        <?php 
            endif
        ?>
        
        <?php if($loguser['role'] === 'admin') :?> 
            <li><?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete the car #{0}?', $car->id)]) ?> </li>
        <?php endif ?>   
    
    </ul>
</nav>
<div class="cars view large-9 medium-8 columns content">
    <h3><?= __('Car') ?></h3>
    <table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Client') ?></th>
            <td><?= $this->Html->link($car->client->name, ['controller' => 'Clients', 'action' => 'view', $car->client->id]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('License') ?></th>
            <td><?= h($car->license) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($car->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($car->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($car->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($car->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Photos') ?></h4>
        <?php if (!empty($car->photos)): ?>
            <table cellpadding="0" cellspacing="0">
                <?php foreach ($car->photos as $photos): ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Html->image($photos->path . $photos->name, [
                                "alt" => $photos->name,
                            ]);
                            ?>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
        <?php endif ?>
    </div>   
    <div class="related">
        <h4><?= __('Related Bookings') ?></h4>
        <?php if (!empty($car->bookings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Date Service') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($car->bookings as $bookings): ?>
            <tr>
                <td><?= $this->Html->link(($bookings['user']->email), ['controller' => 'Users', 'action'=> 'view', $bookings->user_id])?></td>
                <td><?= h($bookings->date_service) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                    
                    <?php 
                        if($loguser['status'] == 1 && $loguser['id'] === $bookings->user_id) :?> 
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
