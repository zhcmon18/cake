<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo[]|\Cake\Collection\CollectionInterface $photos
 */
$loguser = $this->request->getSession()->read('Auth.User');
$urlRedirectToIndex = $this->Url->build([
    "controller" => "Photos",
    "action" => "index"
]);
echo $this->Html->scriptBlock('var urlRedirectToIndex = "' . $urlRedirectToIndex . '";', ['block' => true]);
echo $this->Html->css('Photos/dropzone.min');
echo $this->Html->script('Photos/dropzone', ['block' => 'scriptLibraries']);
echo $this->Html->script('Photos/RedirectToIndex', ['block' => 'scriptBottom']);
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

                </div>
            </div>
        <?php endif ?>
    </ul>
</nav>
<div class="photos index large-9 medium-8 columns content">
    <h3><?= __('Photos') ?></h3>

    <div class="image_upload_div">

        <?php
        echo $this->Form->create('image', [
            'url' => ['controller' => 'Photos',
                'action' => 'add'
            ],
            'method' => 'post',
            'id' => 'my-awesome-dropzone',
            'class' => 'dropzone',
            'type' => 'file',
            'autocomplete' => 'off'
        ]);
        ?>

    </div>


    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= __('Preview') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($photos as $photo): ?>
            <tr>
                <td><?= h($photo->name) ?></td>
                <td>
                    <?php
                        echo $this->Html->image($photo->path . $photo->name, [
                            "alt" => $photo->name,
                            "width" => "220px",
                            "height" => "150px",
                            'url' => ['action' => 'view', $photo->id]
                        ]);
                    ?>

                </td>
                <td><?= h($photo->path) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $photo->id]) ?>
                    <?php
                    if($loguser['status'] === true) :?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id]) ?>
                    <?php
                    endif
                    ?>
                    <?php
                    if($loguser['role'] === 'admin') :?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?>
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
