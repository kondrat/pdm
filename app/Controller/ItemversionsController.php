<?php
App::uses('AppController', 'Controller');
/**
 * Itemversions Controller
 *
 * @property Itemversion $Itemversion
 */
class ItemversionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
//                $ivv = $this->Itemversion->Iv->find('all');
//                //debug($iv);
//                $this->set('ivv',$ivv);
//            
//                $this->request->data["Iv"]["itemversion_id"] = 8;
//                $this->request->data["Iv"]["upitemversion_id"] = 12;
//
//                $this->Itemversion->Iv->save($this->request->data);
                
                
		//$this->Itemversion->recursive = 0;
		$this->set('Itemversions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Itemversion->id = $id;
		if (!$this->Itemversion->exists()) {
			throw new NotFoundException(__('Invalid Itemversion'));
		}
		$this->set('Itemversion', $this->Itemversion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Itemversion->create();
			if ($this->Itemversion->save($this->request->data)) {
				$this->Session->setFlash(__('The Itemversion has been saved'),'default',array('class'=>'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Itemversion could not be saved. Please, try again.'));
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
		$this->Itemversion->id = $id;
		if (!$this->Itemversion->exists()) {
			throw new NotFoundException(__('Invalid Itemversion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Itemversion->save($this->request->data)) {
                            //debug($this->data);
				$this->Session->setFlash(__('The Itemversion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Itemversion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Itemversion->read(null, $id);
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
		$this->Itemversion->id = $id;
		if (!$this->Itemversion->exists()) {
			throw new NotFoundException(__('Invalid Itemversion'));
		}
		if ($this->Itemversion->delete()) {
			$this->Session->setFlash(__('Itemversion deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Itemversion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
