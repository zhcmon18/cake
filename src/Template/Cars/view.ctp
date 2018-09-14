<?php
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
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete the car #{0}?', $car->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add', $car->client_id]) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add', $car->client_id]) ?> </li>      
    </ul>
</nav>
<div class="cars view large-9 medium-8 columns content">
    <h5>#: <?= h($car->id) ?></h5>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $car->has('client') ? $this->Html->link($car->client->name, ['controller' => 'Clients', 'action' => 'view', $car->client->id]) : '' ?></td>
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
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($car->photo) ?></td>
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
        <h4><?= __('Related Bookings') ?></h4>
        <?php if (!empty($car->bookings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col"><?= __('Client') ?></th>
                <th scope="col"><?= __('Car') ?></th>
                <th scope="col"><?= __('Current Km') ?></th>
                <th scope="col"><?= __('Date Service') ?></th>
                <th scope="col"><?= __('Payment Received') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($car->bookings as $bookings): ?>
            <tr>
                <td><?= $this->Html->link(($bookings['user']->email), ['controller' => 'Users', 'action'=> 'view', $bookings->user_id])?></td>
                <td><?= $this->Html->link(($bookings['client']->name), ['controller' => 'Clients', 'action' => 'view', $bookings->client_id]) ?></td>
                <td><?= $this->Html->link(($bookings['car']->model . ' ' . $bookings['car']->license), ['controller' => 'Cars', 'action' => 'view', $bookings->car_id]) ?></td>
                <td><?= h($bookings->current_km) ?></td>
                <td><?= h($bookings->date_service) ?></td>
                <td><?= h($bookings->payment_received ? __('Yes') : __('No'))  ?></td>
                <td><?= h($bookings->description) ?></td>
                <td><?= h($bookings->created) ?></td>
                <td><?= h($bookings->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete the booking #{0}?', $bookings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
