<?php

App::uses('AppController', 'Controller');

/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Item->recursive = 0;
        $this->set('items', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {


            $this->request->data["ItemType"]["id"] = $this->request->data['Item']['ItemType'];
            $this->request->data["Trd"]["id"] = $this->request->data['Item']['Trd'];

            $this->Item->create();
            if ($this->Item->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        }

        $trds = $this->Item->Trd->generateTreeList(null, "{n}.Trd.id", null, '---');
        $this->set(compact('trds'));
        $itemTypes = $this->Item->ItemType->find('list');
        $this->set(compact('itemTypes'));
        $subItems = $this->Item->find('list');
        $this->set(compact('subItems'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data["ItemType"]["id"] = $this->request->data['Item']['ItemType'];
            $this->request->data["Trd"]["id"] = $this->request->data['Item']['Trd'];

            if ($this->Item->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'), "default", array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Item->read(null, $id);
        }

        $trds = $this->Item->Trd->generateTreeList(null, "{n}.Trd.id", null, '---');
        $this->set(compact('trds'));
        $itemTypes = $this->Item->ItemType->find('list');
        $this->set(compact('itemTypes'));
        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
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
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->Item->delete()) {
            $this->Session->setFlash(__('Item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Item->recursive = 0;
        $this->set('items', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        }
        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Item->read(null, $id);
        }
        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
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
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->Item->delete()) {
            $this->Session->setFlash(__('Item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
