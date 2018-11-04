<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Subscription;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        
        if (in_array($action, ['add', 'edit', 'view', 'index', 'viewCars'])) {
            return true;
        }

        /*
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }
        */


    }

    public function findClients() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Clients->find('all', array(
                'conditions' => array('Clients.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => [$result['name'] . ' ('  . $result['telephone'] . ')'], 'value' => $result['name']);
            }

            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*
        if($id == null) {
            $postData = $this->request->getData();
        }
        */
        $client = $this->Clients->get($id, [
            'contain' => ['Bookings' => ['Users', 'Cars'], 'Cars', 'Promotions' => ['Subscriptions']]
        ]);

        $this->set('client', $client);
    }

    public function viewCars($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Cars']
        ]);

        $this->set('client', $client);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }

        $subscriptions = $this->getSubscriptions();
        $subscription_id = $this->getIdSubscription($subscriptions);

        $promotions = $this->getPromotions($subscription_id);

        $this->set(compact('client', 'subscriptions', 'promotions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Promotions' => ['Subscriptions']]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'view', $client->id]);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }

        $subscriptions = $this->getSubscriptions();
        
        if(isset($client->promotion->subscription_id)) {
            $promotions = $this->getPromotions($client->promotion->subscription_id);
        } else {
            $subscription_id = $this->getIdSubscription($subscriptions);
            $promotions = $this->getPromotions($subscription_id);
        }
        
        $this->set(compact('client', 'subscriptions', 'promotions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getSubscriptions() {
        $this->loadModel('Subscriptions');
        $subscriptions = $this->Subscriptions->find('list', ['limit' => 200]);

        $subscriptions = $subscriptions->toArray();
        reset($subscriptions);

        return $subscriptions;
    }

    public function getPromotions($subscription_id) {
        $promotions = $this->Clients->Promotions->find('list', [
            'conditions' => ['Promotions.subscription_id' => $subscription_id],
        ]);

        return $promotions;
    }

    public function getIdSubscription($subscriptions) {
        return $subscription_id = key($subscriptions);
    }
}
