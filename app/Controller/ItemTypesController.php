<?php
App::uses('AppController', 'Controller');
/**
 * Parts Controller
 *
 * @property Part $Part
 */
class ItemTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ItemType->recursive = 0;
		$this->set('parts', $this->paginate());
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
			throw new NotFoundException(__('Invalid part'));
		}
		$this->set('part', $this->ItemType->read(null, $id));
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
				$this->Session->setFlash(__('The part has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ItemType->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->ItemType->delete()) {
			$this->Session->setFlash(__('Part deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Part was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
