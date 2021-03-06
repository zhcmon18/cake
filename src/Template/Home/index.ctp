
<?php $loguser = $this->request->getSession()->read('Auth.User');
if ($loguser != null) : ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <div class="dropdown">
            <button id="navbtn" class="dropbtn"><?= __('Navigation') ?></button>
            <div id="dropnav" class="dropdown-content">
                <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Subscriptions (Monopage)'), ['controller' => 'Subscriptions']) ?> </li>
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