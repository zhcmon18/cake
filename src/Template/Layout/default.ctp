<?php
$loguser = $this->request->getSession()->read('Auth.User');
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
        echo $this->Html->css([
            'base.css',
            'style.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
        ], ['block' => 'scriptLibraries']
    );
    ?>

</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <?php if ($loguser) : ?>
                <?php if($loguser['status'] == 0) :?>
                    <li style="padding: 10px 5px 0 0;">
                        <?= __('Inactif') ?>
                    </li>
                <?php endif ?>
                <li>
                    <?= $this->Html->link($loguser['email'].' '.'('. $loguser['role'].')', ['controller' => 'Users', 'action' => 'view', $loguser['id']]) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
                </li>
            <?php else : ?>
                <li>
                    <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
                </li>
            <?php endif ?>
            <li>
                <ul>
                    <?php
                    if($this->request->getSession()->read('Config.language') == 'en_US') : ?>
                        <li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?> </li>
                        <li><?= $this->Html->link('Русский', ['action' => 'changeLang', 'ru'], ['escape' => false]) ?> </li>
                    <?php elseif($this->request->getSession()->read('Config.language') == 'ru') : ?>
                        <li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?> </li>
                        <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?> </li>
                    <?php else : ?>
                        <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?> </li>
                        <li><?= $this->Html->link('Русский', ['action' => 'changeLang', 'ru'], ['escape' => false]) ?> </li>
                    <?php endif; ?>
                </ul>
                <ul>
                    <li> <?= $this->Html->link(__('About'), ['controller' => 'About', 'action' => 'index']) ?></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
<?= $this->fetch('scriptLibraries') ?>
<?= $this->fetch('script'); ?>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>
