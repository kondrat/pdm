<?php
App::uses('AppController', 'Controller');
/**
 * Materials Controller
 *
 * @property Material $Material
 */
class MaterialsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Material->recursive = 0;
		$this->set('materials', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		$this->set('material', $this->Material->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Material->create();
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
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
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Material->read(null, $id);
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
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->Material->delete()) {
			$this->Session->setFlash(__('Material deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Material was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Material->recursive = 0;
		$this->set('materials', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		$this->set('material', $this->Material->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Material->create();
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
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
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Material->save($this->request->data)) {
				$this->Session->setFlash(__('The material has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Material->read(null, $id);
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
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->Material->delete()) {
			$this->Session->setFlash(__('Material deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Material was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
