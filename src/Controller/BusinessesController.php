<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Businesses Controller
 *
 * @property \App\Model\Table\BusinessesTable $Businesses
 */
class BusinessesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('businesses', $this->paginate($this->Businesses));
        $this->set('_serialize', ['businesses']);
    }

    /**
     * View method
     *
     * @param string|null $id Business id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => ['Testimonials']
        ]);
        $this->set('business', $business);
        $this->set('_serialize', ['business']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $business = $this->Businesses->newEntity();
        if ($this->request->is('post')) {
            $business = $this->Businesses->patchEntity($business, $this->request->data);
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The business could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('business'));
        $this->set('_serialize', ['business']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Business id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $business = $this->Businesses->patchEntity($business, $this->request->data);
            if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The business has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The business could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('business'));
        $this->set('_serialize', ['business']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $business = $this->Businesses->get($id);
        if ($this->Businesses->delete($business)) {
            $this->Flash->success(__('The business has been deleted.'));
        } else {
            $this->Flash->error(__('The business could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function snippet($id = null)
    {
        $this->viewBuilder()->layout(false);// = false;
        $match = $this->Businesses->get($id, [
            'contain' => []
        ]);
        $this->set('id', $id);
        $this->set('name', $match->name);
        $this->set('_serialize', ['id']);
    }
}
