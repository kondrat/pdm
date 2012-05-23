<?php

App::uses('AppController', 'Controller');


/**
 * jobcards Controller
 *
 * @property jobcard $jobcard
 */
class JobcardsController extends AppController {

    
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $jobcards = array();

        $jobcards = $this->Jobcard->recursive = 0;
        $this->set('jobcards', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        $this->set('jobcard', $this->Jobcard->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        
        if ($this->request->is('post')) {
            
            $this->request->data['Jobcard']['machine_id'] = $this->request->data['Jobcard']['Machine'];
            $this->request->data['Jobcard']['material_id'] = $this->request->data['Jobcard']['Material'];
            
            $this->Jobcard->create();
            if ($this->Jobcard->save($this->request->data)) {
                $this->Session->setFlash(__('The job card has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The jobcard could not be saved. Please, try again.'));
            }
        }
        
        $machines = $this->Jobcard->Machine->find('list');
        $this->set('machines',$machines);

        $materials = $this->Jobcard->Material->find('list');
        $this->set('materials',$materials);

        
        $this->loadModel('User');
        $users = $this->User->find('all');
        //$this->set('users',$users);
 
        
        $workers = $originators = $this->Jobcard->Worker->find('list');
        
        
        $this->set('originators',$originators);
        $this->set('workers',$workers);
        
    }

    /**
     * 
     */

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Jobcard']['machine_id'] = $this->request->data['Jobcard']['Machine'];
            $this->request->data['Jobcard']['material_id'] = $this->request->data['Jobcard']['Material'];
            
            if ($this->Jobcard->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The jobcard has been saved'), "default", array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The jobcard could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Jobcard->read(null, $id);
        }
        
        $machines = $this->Jobcard->Machine->find('list');
        $this->set('machines',$machines);

        $materials = $this->Jobcard->Material->find('list');
        $this->set('materials',$materials);
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        if ($this->Jobcard->delete()) {
            $this->Session->setFlash(__('jobcard deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('jobcard was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Jobcard->recursive = 0;
        $this->set('jobcards', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        $this->set('jobcard', $this->Jobcard->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Jobcard->create();
            if ($this->Jobcard->save($this->request->data)) {
                $this->Session->setFlash(__('The jobcard has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The jobcard could not be saved. Please, try again.'));
            }
        }
        $subjobcards = $this->Jobcard->Subjobcard->find('list');
        $this->set(compact('subjobcards'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Jobcard->save($this->request->data)) {
                $this->Session->setFlash(__('The jobcard has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The jobcard could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Jobcard->read(null, $id);
        }
        $subjobcards = $this->Jobcard->Subjobcard->find('list');
        $this->set(compact('subjobcards'));
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Jobcard->id = $id;
        if (!$this->Jobcard->exists()) {
            throw new NotFoundException(__('Invalid jobcard'));
        }
        if ($this->Jobcard->delete()) {
            $this->Session->setFlash(__('jobcard deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('jobcard was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
