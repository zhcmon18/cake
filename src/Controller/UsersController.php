<?php
namespace App\Controller;

use Cake\Core\Exception\Exception;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        return $user['id'] == $id;
        
    }
    
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }
    }

    public function logout() {
        $this->Flash->success(__('You are now logged out.'));
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookings'=> ['Clients', 'Cars']]
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            $user->activation_key = $activation_key = Text::uuid();

            if ($this->Users->save($user)) {
                
                if($this->sendEmail($user)) {
                    $this->Flash->success(__('The user has been saved and an activation email has been sent.'));
                } else {
                    $this->Flash->error(__("The user has been saved, but the activation email could not be sent."));
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activate($activation_key = null) {
        $query = $this->Users->find('all', ['conditions' => ['Users.activation_key' => $activation_key, 'Users.status' => 0]])->first();

        if(!empty($query)){
            $user = $this->Users->get($query['id'], [
                'contain' => []
            ]);
            $user->status = 1;
            $user->activation_key = '';
            
            if($this->Users->save($user)) {
                $this->Flash->success(__('The account ' . $user->email  . ' has been activated.'));
            }

        }else{
            $this->Flash->error(__("The account could not be found or it's activated already."));
        }
    }

    public function sendEmail($user) {
        $success = true;
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/activate/" . $user->activation_key;

        try {
            $email = new Email('default');
            $email->to($user->email);
            $email->subject(__('Activate your account'));
            $email->send(__('Activation link:') . ' ' . $confirmation_link);
        } catch (Exception $ex) {
            $success = false;
        }
        return $success;
    }
}
