<?php
$loguser = $this->request->getSession()->read('Auth.User');

$subscription;
$promotion;

if($client->promotion == null) {
    $subscription = __('Aucun abonnement');
    $promotion = __('Non');
} else {
    $subscription = $client->promotion->subscription->name;
    $promotion = $client->promotion->name;
}
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <div class="dropdown">
            <button id="navbtn" class="dropbtn"><?= __('Navigation') ?></button>
            <div id="dropnav" class="dropdown-content">
                <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Subscriptions (Monopage)'), ['controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
                <?php if($loguser['role'] === 'admin') :?>
                    <li><?= $this->Html->link(__('List Subscriptions (View Admin)'), ['prefix' => 'admin', 'controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                <?php endif?>

                <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
            </div>
        </div><br>
        <?php if($loguser['status'] === true) : ?>
            <div class="dropdown">
                <button id="actbtn" class="dropbtn"><?= __('Actions') ?></button>
                <div id="dropact" class="dropdown-content">
                    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
                    <?php if($loguser['role'] === 'admin') :?>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <?php endif?>
                    <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
                    <hr>
                    <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add', $client->id]) ?> </li>
                    <?php if (!empty($client->cars)): ?>
                        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add', $client->id]) ?> </li>
                    <?php endif ?>
                    <li><?= $this->Html->link(__('Edit Client'), ['controller' => 'Clients', 'action' => 'edit', $client->id]) ?> </li>
                    <?php if($loguser['role'] === 'admin') :?>
                        <li><?= $this->Form->postLink(__('Delete Client'), ['controller' => 'Clients', 'action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete the client # {0}?', $client->id)]) ?> </li>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= __('Client') ?></h3>
    <p><?= $this->Html->link(__('Download in format pdf'), ['action' => 'view', $client->id . '.pdf']) ?></p>
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
            <th scope="row"><?= __('Subscription') ?></th>
            <td><?= h($subscription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= h($promotion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($client->active ? __('Yes') : __('No')); ?></td>
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
    <?php
        if(!empty($client->cars)) {
            echo $this->Html->link(__("Show Client's cars"), ['controller' => 'Clients', 'action' => 'view_cars', $client->id]); } ?>
    <div class="related">
        <?php if (!empty($client->bookings)): ?>
            <h4><?= __('Related Bookings') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Created by') ?></th>
                    <th scope="col"><?= __('Car') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($client->bookings as $bookings): ?>
                    <tr>
                        <td><?= $this->Html->link(($bookings['user']->username), ['controller' => 'Users', 'action'=> 'view', $bookings->user_id]) ?></td>
                        <td><?= $this->Html->link(($bookings['car']->model . ' ' . $bookings['car']->license), ['controller' => 'Cars', 'action' => 'view', $bookings['car']->id] ) ?></td>

                        <td><?= h($bookings->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>

                            <?php
                            if ($loguser['status'] === true && $loguser['id'] === $bookings->user_id || $loguser['role'] === 'admin'): ?>
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
</div>