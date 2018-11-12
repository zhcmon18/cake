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

    public function isAuthorized($user) {

        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        if (in_array($action, ['add', 'edit', 'view', 'index'])) {
            return true;
        }

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $subscriptions = $this->paginate($this->Subscriptions);

        $this->set(compact('subscriptions'));
    }
}
