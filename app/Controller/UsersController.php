<?php
App::uses('AppController', 'Controller');
/**
 * users Controller
 *
 * @property user $user
 */
class UsersController extends AppController {
    
    /*
     * before filter
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('reg','logout');
    }    
    
    /**
     * reg
     */
    
    public function reg(){
            if ($this->request->is('post')) {
                //debug($this->request->data);
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('controller'=>'pages','action' => 'home'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
        
        
    }

    /**
     * Login
     * 
     */

    public function login(){

        if ($this->request->is('post')) {
            if ($this->Auth->login($this->request->data)) {
                
                $user = $this->User->find('first',array(
                    'conditions'=>array('User.name'=>$this->request->data['User']['name'])
                ));

                $this->request->data['User']['id'] = $user['User']['id'];
                $this->request->data['User']['last_login'] = date('Y-m-d h:i:s');
                $this->User->save($this->request->data);
                
                $this->Session->write('Auth.User.User.curprj', $user['User']['last_prj_id']);
                $this->Session->write('Auth.User.User.id', $user['User']['id']);
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect!');
            }
        }
        
    }

    public function logout() {
         $this->redirect($this->Auth->logout());
    }


 /**
  * index method
  *
  * @return void
  */
	public function index() {
            

            
            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('user deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
