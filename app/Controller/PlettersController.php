<?php
App::uses('AppController', 'Controller');
/**
 * Pletters Controller
 *
 * @property Pletter $Pletter
 */
class PlettersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pletter->recursive = 0;
		$this->set('pletters', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		$this->set('pletter', $this->Pletter->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pletter->create();
			if ($this->Pletter->save($this->request->data)) {
				$this->Session->setFlash(__('The pletter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pletter could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Pletter->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pletter->save($this->request->data)) {
				$this->Session->setFlash(__('The pletter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pletter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pletter->read(null, $id);
		}
		$projects = $this->Pletter->Project->find('list');
		$this->set(compact('projects'));
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
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		if ($this->Pletter->delete()) {
			$this->Session->setFlash(__('Pletter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pletter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Pletter->recursive = 0;
		$this->set('pletters', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		$this->set('pletter', $this->Pletter->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pletter->create();
			if ($this->Pletter->save($this->request->data)) {
				$this->Session->setFlash(__('The pletter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pletter could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Pletter->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pletter->save($this->request->data)) {
				$this->Session->setFlash(__('The pletter has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pletter could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pletter->read(null, $id);
		}
		$projects = $this->Pletter->Project->find('list');
		$this->set(compact('projects'));
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
		$this->Pletter->id = $id;
		if (!$this->Pletter->exists()) {
			throw new NotFoundException(__('Invalid pletter'));
		}
		if ($this->Pletter->delete()) {
			$this->Session->setFlash(__('Pletter deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pletter was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
