<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class SubscriptionsController extends AppController
{
    public function isAuthorized($user) {
        return true;
    }

    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];


}