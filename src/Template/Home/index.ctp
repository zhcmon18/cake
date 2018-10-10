<?php $loguser = $this->request->getSession()->read('Auth.User');

if ($loguser != null) : ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Navigation') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>          
        
        <?php if($loguser['role'] === 'admin') :?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php endif?>
        
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Files', 'action' => 'index']) ?></li>

        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>

        <?php if($loguser['role'] === 'admin') :?>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif?>

    </ul>
</nav>
<?php endif ?>

<div class="bookings view large-9 medium-8 columns content">
    <h3><?= __('List of reserved dates') ?></h3>
    <table class="vertical-table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('date_service') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bookings as $booking) :?>
            <tr>
                <th scope="row"><?= $booking->date_service->i18nFormat('yyyy-MM-dd HH:mm') ?></th>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>