<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Testimonials Controller
 *
 * @property \App\Model\Table\TestimonialsTable $Testimonials
 */
class TestimonialsController extends AppController
{

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('edit');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Businesses']
        ];
        $this->set('testimonials', $this->paginate($this->Testimonials));
        $this->set('_serialize', ['testimonials']);
    }

    /**
     * View method
     *
     * @param string|null $id Testimonial id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testimonial = $this->Testimonials->get($id, [
            'contain' => ['Businesses']
        ]);
        $this->set('testimonial', $testimonial);
        $this->set('_serialize', ['testimonial']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimonial = $this->Testimonials->newEntity();
        if ($this->request->is('post')) {
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            $testimonial->hash = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

            if ($this->Testimonials->save($testimonial)) {
                $email = new Email('default');

$email->from(['brian.elite@gmail.com' => 'Review service'])
    ->to($testimonial->client_email)
    ->subject('Please write review')
    ->send('Dear '.$testimonial->client_name . '\r\nPlease visit http://itaxe.pl/clients/testimonial/testimonials/edit/'.$testimonial->hash. ' to leave short review about transaction');
                $this->Flash->success(__('The testimonial has been saved and email to client sent.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
            }
        }
        $businesses = $this->Testimonials->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('testimonial', 'businesses'));
        $this->set('_serialize', ['testimonial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Testimonial id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        /*$testimonial = $this->Testimonials->get($id, [
            'contain' => []
        ]);*/
        $query = $this->Testimonials->find('all', array(
        'conditions' => array('Testimonials.hash' => $id)
    ));
        $testimonial = $query->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success(__('The testimonial has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimonial could not be saved. Please, try again.'));
            }
        }
        $businesses = $this->Testimonials->Businesses->find('list', ['limit' => 200]);
        $this->set(compact('testimonial', 'businesses'));
        $this->set('_serialize', ['testimonial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Testimonial id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testimonial = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($testimonial)) {
            $this->Flash->success(__('The testimonial has been deleted.'));
        } else {
            $this->Flash->error(__('The testimonial could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
