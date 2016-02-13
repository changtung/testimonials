<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hosts Controller
 *
 * @property \App\Model\Table\HostsTable $Hosts
 */
class HostsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Matchteams']
        ];
        $this->set('hosts', $this->paginate($this->Hosts));
        $this->set('_serialize', ['hosts']);
    }

    /**
     * View method
     *
     * @param string|null $id Host id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $host = $this->Hosts->get($id, [
            'contain' => ['Matchteams']
        ]);
        $this->set('host', $host);
        $this->set('_serialize', ['host']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $host = $this->Hosts->newEntity();
        if ($this->request->is('post')) {
            $host = $this->Hosts->patchEntity($host, $this->request->data);
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('The host has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The host could not be saved. Please, try again.'));
            }
        }
        $matchteams = $this->Hosts->Matchteams->find('list', ['limit' => 200]);
        $this->set(compact('host', 'matchteams'));
        $this->set('_serialize', ['host']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Host id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $host = $this->Hosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $host = $this->Hosts->patchEntity($host, $this->request->data);
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('The host has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The host could not be saved. Please, try again.'));
            }
        }
        $matchteams = $this->Hosts->Matchteams->find('list', ['limit' => 200]);
        $this->set(compact('host', 'matchteams'));
        $this->set('_serialize', ['host']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Host id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $host = $this->Hosts->get($id);
        if ($this->Hosts->delete($host)) {
            $this->Flash->success(__('The host has been deleted.'));
        } else {
            $this->Flash->error(__('The host could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
