<?php
App::uses('AppController', 'Controller');
/**
 * Responscodes Controller
 *
 * @property Responscode $Responscode
 */
class ResponscodesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Responscode->recursive = 0;
		$this->set('responscodes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		$this->set('responscode', $this->Responscode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Responscode->create();
			if ($this->Responscode->save($this->request->data)) {
				$this->Session->setFlash(__('The responscode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responscode could not be saved. Please, try again.'));
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
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Responscode->save($this->request->data)) {
				$this->Session->setFlash(__('The responscode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responscode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Responscode->read(null, $id);
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
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		if ($this->Responscode->delete()) {
			$this->Session->setFlash(__('Responscode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Responscode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Responscode->recursive = 0;
		$this->set('responscodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		$this->set('responscode', $this->Responscode->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Responscode->create();
			if ($this->Responscode->save($this->request->data)) {
				$this->Session->setFlash(__('The responscode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responscode could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Responscode->save($this->request->data)) {
				$this->Session->setFlash(__('The responscode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responscode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Responscode->read(null, $id);
		}
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
		$this->Responscode->id = $id;
		if (!$this->Responscode->exists()) {
			throw new NotFoundException(__('Invalid responscode'));
		}
		if ($this->Responscode->delete()) {
			$this->Session->setFlash(__('Responscode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Responscode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
