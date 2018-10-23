<?php
$loguser = $this->request->getSession()->read('Auth.User');
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Promotions",
    "action" => "getBySubscription",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Clients/add', ['block' => 'scriptBottom']);
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
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
            echo $this->Form->control('subscription_id', ['options' => $subscriptions]);
            echo $this->Form->control('promotion_id', ['options' => $promotions]);
            echo $this->Form->control('name');
            echo $this->Form->control('telephone');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
