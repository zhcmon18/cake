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

        <?php 
            if($loguser['role'] === 'admin') :?>
                <li class="heading"><?= __('Actions') ?></li> 
                <li><?= $this->Form->postLink(__('Delete Client'), ['controller' => 'Clients', 'action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete the client # {0}?', $client->id)]) ?> </li>
        <?php 
            endif 
        ?>  
   
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
