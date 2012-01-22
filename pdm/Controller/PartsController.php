<?php
App::uses('AppController', 'Controller');
/**
 * Parts Controller
 *
 * @property Part $Part
 */
class PartsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Part->recursive = 0;
		$this->set('parts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Part->id = $id;
		if (!$this->Part->exists()) {
			throw new NotFoundException(__('Invalid part'));
		}
		$this->set('part', $this->Part->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Part->create();
			if ($this->Part->save($this->request->data)) {
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
		$this->Part->id = $id;
		if (!$this->Part->exists()) {
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Part->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Part->read(null, $id);
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
		$this->Part->id = $id;
		if (!$this->Part->exists()) {
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->Part->delete()) {
			$this->Session->setFlash(__('Part deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Part was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
