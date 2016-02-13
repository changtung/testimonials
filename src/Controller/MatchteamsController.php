<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Matchteams Controller
 *
 * @property \App\Model\Table\MatchteamsTable $Matchteams
 */
class MatchteamsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('matchteams', $this->paginate($this->Matchteams));
        $this->set('_serialize', ['matchteams']);
    }

    /**
     * View method
     *
     * @param string|null $id Matchteam id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matchteam = $this->Matchteams->get($id, [
            'contain' => ['Guests', 'Hosts']
        ]);
        $this->set('matchteam', $matchteam);
        $this->set('_serialize', ['matchteam']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $matchteam = $this->Matchteams->newEntity();
        if ($this->request->is('post')) {
            $matchteam = $this->Matchteams->patchEntity($matchteam, $this->request->data);
            if ($this->Matchteams->save($matchteam)) {
                $this->Flash->success(__('The matchteam has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The matchteam could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('matchteam'));
        $this->set('_serialize', ['matchteam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Matchteam id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matchteam = $this->Matchteams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $matchteam = $this->Matchteams->patchEntity($matchteam, $this->request->data);
            if ($this->Matchteams->save($matchteam)) {
                $this->Flash->success(__('The matchteam has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The matchteam could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('matchteam'));
        $this->set('_serialize', ['matchteam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Matchteam id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $matchteam = $this->Matchteams->get($id);
        if ($this->Matchteams->delete($matchteam)) {
            $this->Flash->success(__('The matchteam has been deleted.'));
        } else {
            $this->Flash->error(__('The matchteam could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
