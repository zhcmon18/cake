<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 *
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhotosController extends AppController
{
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin' && $user['status'] === true) {
            return true;
        }

        if (in_array($action, ['add', 'edit']) && $user['status'] === true) {
            return true;
        }

        if (in_array($action, ['view', 'index'])) {
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
        $photos = $this->paginate($this->Photos);

        $this->set(compact('photos'));
    }

    /**
     * View method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Cars']
        ]);

        $this->set('photo', $photo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $photo = $this->Photos->newEntity();
        if ($this->request->is('post') or $this->request->is('ajax')) {

            if (!empty($this->request->data['file']['name'])) {

                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'Files/';
                $uploadFile = $uploadPath . $fileName;

                if (move_uploaded_file($this->request->data['file']['tmp_name'], 'img/' . $uploadFile)) {

                    $photo = $this->Photos->patchEntity($photo, $this->request->getData());
                    $photo->name = $fileName;
                    $photo->path = $uploadPath;
                    $photo->status = 1;

                    if ($this->Photos->save($photo)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }
        $cars = $this->Photos->Cars->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'cars'));
        $this->set('_serialize', ['photo']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Cars']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $cars = $this->Photos->Cars->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'cars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);

        $name = $photo->name;

        if ($this->Photos->delete($photo)) {

            $file = new File(WWW_ROOT . 'img/Files/' . $name, false, 0777);

            if($file->delete()) {
                $this->Flash->success(__('The photo has been deleted.'));
            } else {
                $this->Flash->error(__('Error deleting the photo from the file system'));
            }

        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
