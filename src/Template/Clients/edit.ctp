<?php
$loguser = $this->request->session()->read('Auth.User');
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Promotions",
    "action" => "getBySubscription",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Clients/add-edit', ['block' => 'scriptBottom']);

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
                <?php
                if($loguser['role'] === 'admin') :?>
                    <li><?= $this->Form->postLink(__('Delete Client'), ['controller' => 'Clients', 'action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete the client # {0}?', $client->id)]) ?> </li>
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>

    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            if(isset($client['promotion']->subscription_id)) {
                echo $this->Form->control('subscription_id', ['options' => $subscriptions, 'default' => $client['promotion']->subscription_id]);
                echo $this->Form->control('promotion_id', ['options' => $promotions, 'default' => $client['promotion']->id]);
            } else {
                echo $this->Form->control('subscription_id', ['options' => $subscriptions]);
                echo $this->Form->control('promotion_id', ['options' => $promotions]);
            }
            echo $this->Form->control('name');
            echo $this->Form->control('telephone');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('active', ['type' => 'checkbox', 'label' => __('Active')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
