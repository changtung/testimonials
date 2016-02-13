<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Guests Controller
 *
 * @property \App\Model\Table\GuestsTable $Guests
 */
class GuestsController extends AppController
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
        $this->set('guests', $this->paginate($this->Guests));
        $this->set('_serialize', ['guests']);
    }

    /**
     * View method
     *
     * @param string|null $id Guest id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => ['Matchteams', 'Hosts']
        ]);
        $this->set('guest', $guest);
        $this->set('_serialize', ['guest']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guest = $this->Guests->newEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->data);
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guest could not be saved. Please, try again.'));
            }
        }
        $matchteams = $this->Guests->Matchteams->find('list', ['limit' => 200]);
        $hosts = $this->Guests->Hosts->find('list', ['limit' => 200]);
        $this->set(compact('guest', 'matchteams', 'hosts'));
        $this->set('_serialize', ['guest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Guest id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => ['Hosts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guest = $this->Guests->patchEntity($guest, $this->request->data);
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The guest could not be saved. Please, try again.'));
            }
        }
        $matchteams = $this->Guests->Matchteams->find('list', ['limit' => 200]);
        $hosts = $this->Guests->Hosts->find('list', ['limit' => 200]);
        $this->set(compact('guest', 'matchteams', 'hosts'));
        $this->set('_serialize', ['guest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $guest = $this->Guests->get($id);
        if ($this->Guests->delete($guest)) {
            $this->Flash->success(__('The guest has been deleted.'));
        } else {
            $this->Flash->error(__('The guest could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
