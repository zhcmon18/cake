<?php
$loguser = $this->request->session()->read('Auth.User');
$urlToCarsAutocompletedemoJson = $this->Url->build([
    "controller" => "Clients",
    "action" => "findClients",
    "_ext" => "json"
        ]);
echo $this->Html->script('Clients/test');
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Clients/search', ['block' => 'scriptBottom']);

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation') ?></li>
         <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
         <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>         
         
         <?php 
            if($loguser['role'] === 'admin') : ?>
                <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
         <?php 
            endif
        ?> 
         
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>

        <?php
            if ($loguser['status'] == 1): ?>
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?></li>
        <?php 
            endif
        ?>

    </ul>
</nav>
<div class="clients index large-9 medium-8 columns content">
    <?= $this->Form->create($clients/*, ['url' => ['action' => 'view']]*/) ?>
    <fieldset>
        <legend><?= __('Search Client') ?></legend>
            <?php
                echo $this->Form->control('name', ['id' => 'autocomplete']);
            ?>
    </fieldset>
    <?= $this->Form->end() ?>

    <h3><?= __('Clients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>               
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= h($client->name) ?></td>
                <td><?= h($client->telephone) ?></td>
                <td><?= h($client->address) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
                    
                    <?php 
                        if($loguser['status'] == 1) : ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
                    <?php 
                        endif
                    ?>       
                    <?php 
                        if($loguser['role'] == 'admin') : ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
                    <?php 
                        endif 
                    ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
