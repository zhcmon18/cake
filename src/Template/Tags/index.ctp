<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
         <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>         
         
         <?php if($loguser['role'] === 'admin') : ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
         <?php endif?>

        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Files', 'action' => 'index']) ?></li>  
        
        <?php 
            if($loguser['status'] == 1) : ?>
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?></li>
         <?php 
            endif
        ?> 
    
    </ul>
</nav>
<div class="tags index large-9 medium-8 columns content">
    <h3><?= __('Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag): ?>
            <tr>
                <td><?= h($tag->title) ?></td>
                <td><?= h($tag->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tag->id]) ?>
                    
                    <?php 
                        if($loguser['status'] == 1) : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tag->id]) ?>
                    <?php 
                        endif
                    ?>

                    <?php if($loguser['role'] === 'admin') : ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> 
                    <?php endif?>
                
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
