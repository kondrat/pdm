<?php
App::uses('AppController', 'Controller');
/**
 * ProjectPlans Controller
 *
 * @property ProjectPlans $ProjectPlans
 */
class ProjectPlansController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProjectPlan->recursive = 0;
		$this->set('ProjectPlans', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProjectPlan->id = $id;
		if (!$this->ProjectPlan->exists()) {
			throw new NotFoundException(__('Invalid ProjectPlans'));
		}
		$this->set('ProjectPlans', $this->ProjectPlan->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $this->set('projects', $this->ProjectPlan->Project->find('list',
                        array('fields' => array('Project.projectname'))
                        
                        ));
		if ($this->request->is('post')) {
			$this->ProjectPlan->create();
			if ($this->ProjectPlan->save($this->request->data)) {
				$this->Session->setFlash(__('The ProjectPlans has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ProjectPlans could not be saved. Please, try again.'));
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
		$this->ProjectPlan->id = $id;
            
		if (!$this->ProjectPlan->exists()) {
			throw new NotFoundException(__('Invalid ProjectPlans'));
		}
                $this->set('projects', $this->ProjectPlan->Project->find('list',
                        array('fields' => array('Project.projectname'))
                        
                        ));
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjectPlan->save($this->request->data)) {
				$this->Session->setFlash(__('The ProjectPlans has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ProjectPlans could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProjectPlan->read(null, $id);
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
		$this->ProjectPlan->id = $id;
		if (!$this->ProjectPlan->exists()) {
			throw new NotFoundException(__('Invalid ProjectPlans'));
		}
		if ($this->ProjectPlan->delete()) {
			$this->Session->setFlash(__('ProjectPlans deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('ProjectPlans was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
