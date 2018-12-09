<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class SubscriptionsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
    }

    public $paginate = [
        'page' => 1,
        'limit' => 25,
        'maxLimit' => 50,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];


}