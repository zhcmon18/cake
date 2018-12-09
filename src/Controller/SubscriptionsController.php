<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subscriptions Controller
 *
 * @property \App\Model\Table\SubscriptionsTable $Subscriptions
 *
 * @method \App\Model\Entity\subscription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubscriptionsController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function isAuthorized($user) {
        return true;
    }

    public function getSubscriptions() {
        $this->autoRender = false;

        $subscriptions = $this->Subscriptions->find('all', [
            'contain' => ['Promotions'],
        ]);

        $subscriptionsJ = json_encode($subscriptions);
        $this->response->type('json');
        $this->response->body($subscriptionsJ);
    }
}
