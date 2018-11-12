<?php
$loguser = $this->request->getSession()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
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
        <?php if($loguser['status'] == 1) : ?>
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
                    <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
                    <?php if($loguser['role'] === 'admin') : ?>
                        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete the tag #{0}?', $tag->id)]) ?> </li>
                    <?php endif
                    ?>
                </div>
            </div>
        <?php endif ?>
         
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= __('Tag') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tag->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($tag->bookings)): ?>
            <h4><?= __('Related Bookings') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('User') ?></th>
                    <th scope="col"><?= __('Client') ?></th>
                    <th scope="col"><?= __('Car') ?></th>
                    <th scope="col"><?= __('Date Service') ?></th>

                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($tag->bookings as $bookings): ?>
                <tr>
                    <td><?= $this->Html->link(($bookings['user']->email), ['controller'=>'Users', 'action'=>'view', $bookings['user']->id]) ?></td>
                    <td><?= $this->Html->link(($bookings['client']->name), ['controller'=>'Clients', 'action'=>'view', $bookings['client']->id]) ?></td>
                    <td><?= $this->Html->link(($bookings['car']->model . ' ' . $bookings['car']->license), ['controller'=>'Cars', 'action'=>'view', $bookings['car']->id]) ?></td>
                    <td><?= h($bookings->date_service) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>

                        <?php
                            if(($loguser['status'] == 1 && $loguser['id'] == $bookings->user_id) || $loguser['role'] == 'admin') : ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                        <?php
                            endif
                        ?>
                        <?php
                            if($loguser['role'] === 'admin') : ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete the booking# {0}?', $bookings->id)]) ?>
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
