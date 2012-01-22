<?php

App::uses('AppController', 'Controller');

/**
 * Trds Controller
 *
 * @property Trd $Trds
 */
class TrdsController extends AppController {

    public $name = 'Trds';

    function index() {
        $data = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '...');
        $thread = $allChildren = $this->Trd->children(10); 
        debug($thread);
        debug($data);
        $this->set('trds', $data);
        //die;
    }

    /**
     * add new trd
     * 
     * @return void
     */
    function add() {
        
        if ($this->request->is('post')) {
            // @todo check if it bug or not. Should be converted automatecly 
            $this->request->data['Trd']['parent_id'] = $this->request->data['Trd']['parentId'];
   
            $this->Trd->create();
            if ($this->Trd->save($this->request->data)) {
                $this->Session->setFlash(__('The Trd has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Trd could not be saved. Please, try again.'));
            }
        }
        
        $parentIds = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '...');
        //$parentIds = $this->Trd->find('list');
        $this->set(compact('parentIds'));
        
        
    }

}

?>
