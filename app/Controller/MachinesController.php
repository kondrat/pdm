<?php

App::uses('AppController', 'Controller');

/**
 * machines Controller
 *
 * @property machine $machine
 */
class MachinesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $machines = array();

        $machines = $this->Machine->recursive = 0;
        $this->set('machines', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        $this->set('machine', $this->Machine->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Machine->create();
            if ($this->Machine->save($this->request->data)) {
                $this->Session->setFlash(__('The Machine has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The machine could not be saved. Please, try again.'));
            }
        }
        
        
        
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
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {


            if ($this->Machine->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The machine has been saved'), "default", array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The machine could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Machine->read(null, $id);
        }
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
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        if ($this->Machine->delete()) {
            $this->Session->setFlash(__('machine deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('machine was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Machine->recursive = 0;
        $this->set('machines', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        $this->set('machine', $this->Machine->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Machine->create();
            if ($this->Machine->save($this->request->data)) {
                $this->Session->setFlash(__('The machine has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The machine could not be saved. Please, try again.'));
            }
        }
        $submachines = $this->Machine->Submachine->find('list');
        $this->set(compact('submachines'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Machine->save($this->request->data)) {
                $this->Session->setFlash(__('The machine has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The machine could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Machine->read(null, $id);
        }
        $submachines = $this->Machine->Submachine->find('list');
        $this->set(compact('submachines'));
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
        $this->Machine->id = $id;
        if (!$this->Machine->exists()) {
            throw new NotFoundException(__('Invalid machine'));
        }
        if ($this->Machine->delete()) {
            $this->Session->setFlash(__('machine deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('machine was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
