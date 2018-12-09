<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 *
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
        if (isset($user['role']) && $user['role'] === 'admin' && $user['status'] === true) {
            return true;
        }
        
        if (in_array($action, ['index', 'view'])) {
            return true;
        }

        if ((in_array($action, ['add'])) && $user['status'] === true) {
            return true;
        }

        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the booking belongs to the current user.
        $booking = $this->Bookings->findById($id)->first();

        return $booking->user_id === $user['id'] && $user['status'] === true;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Clients', 'Cars']
        ];
        $bookings = $this->paginate($this->Bookings);
        
        $this->set(compact('bookings'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'Clients', 'Cars', 'Tags']
        ]);
        
        $this->set('booking', $booking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $booking = $this->Bookings->newEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            
            $booking->user_id = $this->Auth->user('id');
            $booking->client_id = $id;

            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['controller' => 'Clients', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }

        $clients = $this->Bookings->Clients->find('list', ['conditions' => ['Clients.id' => $id]]);
        $cars = $this->Bookings->Cars->find('list', ['conditions' => ['Cars.client_id' => $id]]);
        $tags = $this->Bookings->Tags->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'users', 'clients', 'cars', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users', 'Clients', 'Cars', 'Tags']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, 
                    $this->request->getData(),
                    ['accessibleFields' => ['user_id' => false]]);
     
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', ['limit' => 200]);
        $clients = $this->Bookings->Clients->find('list', ['limit' => 200]);
        $cars = $this->Bookings->Cars->find('list', ['limit' => 200]);
        $tags = $this->Bookings->Tags->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'users', 'clients', 'cars', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function tags() {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');

        // Use the BookingsTable to find tagged bookings.
        $bookings = $this->Bookings->find('tagged', [
            'tags' => $tags
        ]);

        // Pass variables into the view template context.
        $this->set([
            'bookings' => $bookings,
            'tags' => $tags
        ]);
    }
}
