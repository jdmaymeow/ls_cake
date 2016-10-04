<?php
namespace App\Controller;

use App\Smlovely\Shortener;
use App\Controller\AppController;

/**
 * Links Controller
 *
 * @property \App\Model\Table\LinksTable $Links
 */
class LinksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories']
        ];
        $links = $this->paginate($this->Links);

        $this->set(compact('links'));
        $this->set('_serialize', ['links']);
    }

    /**
     * View method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => ['Users', 'Categories']
        ]);

        $this->set('link', $link);
        $this->set('_serialize', ['link']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $link = $this->Links->newEntity();
        if ($this->request->is('post')) {
            $link = $this->Links->patchEntity($link, $this->request->data);
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                // OK behavior not working so ..
                // Workaround if its not working in behavior :D
                // Ill update this with behavir if i find how...
                $shortener = new Shortener();
                $link->shortened = $shortener->short($link->id);
                $this->Links->save($link);


                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The link could not be saved. Please, try again.'));
            }
        }
        $users = $this->Links->Users->find('list', ['limit' => 200]);
        $categories = $this->Links->Categories->find('list', ['limit' => 200]);
        $this->set(compact('link', 'users', 'categories'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $link = $this->Links->patchEntity($link, $this->request->data);
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The link could not be saved. Please, try again.'));
            }
        }
        $users = $this->Links->Users->find('list', ['limit' => 200]);
        $categories = $this->Links->Categories->find('list', ['limit' => 200]);
        $this->set(compact('link', 'users', 'categories'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Link id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $link = $this->Links->get($id);
        if ($this->Links->delete($link)) {
            $this->Flash->success(__('The link has been deleted.'));
        } else {
            $this->Flash->error(__('The link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function go($shortenedID = null)
    {
        //we need find only one item
        $link = $this->Links->findByShortened($shortenedID)->first();
        $this->addCount($link->id);
        $this->redirect($link->url);
    }

    protected function addCount($id = null)
    {
        //Not shortened id
        $link = $this->Links->get($id);

        //$link->views = $link->views;
        //OR make it Simpler
        $link->views++;

        if ($this->Links->save($link)) {
            return true;
        }

        return false;
    }
}
