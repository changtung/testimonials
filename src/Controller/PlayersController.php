<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 */
class PlayersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Matches']
        ];
        $this->set('players', $this->paginate($this->Players));
        $this->set('_serialize', ['players']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function addall($team_id)
    {
        $this->set('players_primary', $this->paginate($this->Players->find('all')
    ->where(['Players.team_id' => $team_id])
    ->where(['Players.primary_squad' => true])
    ));
    $this->set('players_secondary', $this->paginate($this->Players->find('all')
->where(['Players.team_id' => $team_id])
->where(['Players.primary_squad' => false])
));
        $this->set('_serialize', ['players_primary','players_secondary']);
    }
    /**
     * View method
     *
     * @param string|null $id Player id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => ['Teams', 'Matches']
        ]);
        $this->set('player', $player);
        $this->set('_serialize', ['player']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $player = $this->Players->patchEntity($player, $this->request->data);
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The player could not be saved. Please, try again.'));
            }
        }
        $teams = $this->Players->Teams->find('list', ['limit' => 200]);
        $matches = $this->Players->Matches->find('list', ['limit' => 200]);
        $this->set(compact('player', 'teams', 'matches'));
        $this->set('_serialize', ['player']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Player id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->data);
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The player could not be saved. Please, try again.'));
            }
        }
        $teams = $this->Players->Teams->find('list', ['limit' => 200]);
        $matches = $this->Players->Matches->find('list', ['limit' => 200]);
        $this->set(compact('player', 'teams', 'matches'));
        $this->set('_serialize', ['player']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Player id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function save($id = null,$team_id)
    {
        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->data);
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));
                return $this->redirect(['action' => 'addall',$team_id]);
            } else {
                $this->Flash->error(__('The player could not be saved. Please, try again.'));
            }
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Player id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $player = $this->Players->get($id);
        if ($this->Players->delete($player)) {
            $this->Flash->success(__('The player has been deleted.'));
        } else {
            $this->Flash->error(__('The player could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
