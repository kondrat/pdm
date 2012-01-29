<?php
App::uses('AppController', 'Controller');
/**
 * ItemTypes Controller
 *
 * @property ItemType $ItemType
 */
class ItemTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ItemType->recursive = 0;
		$this->set('itemtypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ItemType->id = $id;
		if (!$this->ItemType->exists()) {
			throw new NotFoundException(__('Invalid ItemType'));
		}
		$this->set('itemtypes', $this->ItemType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemType->create();
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__('The ItemType has been saved'),'default',array('class'=>'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ItemType could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ItemType->id = $id;
		if (!$this->ItemType->exists()) {
			throw new NotFoundException(__('Invalid ItemType'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ItemType->save($this->request->data)) {
                            //debug($this->data);
				$this->Session->setFlash(__('The ItemType has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ItemType could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ItemType->read(null, $id);
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
		$this->ItemType->id = $id;
		if (!$this->ItemType->exists()) {
			throw new NotFoundException(__('Invalid ItemType'));
		}
		if ($this->ItemType->delete()) {
			$this->Session->setFlash(__('ItemType deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('ItemType was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
