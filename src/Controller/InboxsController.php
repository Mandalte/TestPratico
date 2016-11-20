<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inboxs Controller
 *
 * @property \App\Model\Table\InboxsTable $Inboxs
 */
class InboxsController extends AppController
{

    public function isAuthorized($user)
{
$action = $this->request->params['action'];
// As ações add e index são permitidas sempre.
if (in_array($action, ['index', 'add'])) {
    return true;
}
// Todas as outras ações requerem um id.
if (empty($this->request->params['pass'][0])) {
return false;
}
// Checa se o bookmark pertence ao user atual.
$id = $this->request->params['pass'][0];
$bookmark = $this->Bookmarks->get($id);
if ($bookmark->user_id == $user['id']) {
return true;
}
return parent::isAuthorized($user);
}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $inboxs = $this->paginate($this->Inboxs);

        $this->set(compact('inboxs'));
        $this->set('_serialize', ['inboxs']);
    }

    /**
     * View method
     *
     * @param string|null $id Inbox id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inbox = $this->Inboxs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('inbox', $inbox);
        $this->set('_serialize', ['inbox']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inbox = $this->Inboxs->newEntity();
        if ($this->request->is('post')) {
            $inbox = $this->Inboxs->patchEntity($inbox, $this->request->data);
            if ($this->Inboxs->save($inbox)) {
                $this->Flash->success(__('The inbox has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inbox could not be saved. Please, try again.'));
            }
        }
        $users = $this->Inboxs->Users->find('list', ['limit' => 200]);
        $this->set(compact('inbox', 'users'));
        $this->set('_serialize', ['inbox']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inbox id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inbox = $this->Inboxs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inbox = $this->Inboxs->patchEntity($inbox, $this->request->data);
            if ($this->Inboxs->save($inbox)) {
                $this->Flash->success(__('The inbox has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inbox could not be saved. Please, try again.'));
            }
        }
        $users = $this->Inboxs->Users->find('list', ['limit' => 200]);
        $this->set(compact('inbox', 'users'));
        $this->set('_serialize', ['inbox']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inbox id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inbox = $this->Inboxs->get($id);
        if ($this->Inboxs->delete($inbox)) {
            $this->Flash->success(__('The inbox has been deleted.'));
        } else {
            $this->Flash->error(__('The inbox could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
