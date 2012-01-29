<?php

App::uses('AppController', 'Controller');
//App::import('Utility', 'Set');


/**
 * Trds Controller
 *
 * @property Trd $Trds
 */
class TrdsController extends AppController {

    public $name = 'Trds';

    public $countRec = 0;


    public function index() {
        $trds = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

        //$thread  = $this->Trd->children(1,TRUE); 
        $nest = $this->Trd->find('all');

        //$nest = Set::nest($nest,array('root' => '1'));
        //debug($nest);
        //$a = $this->getTree(0);
        //debug($a);
        //$this->set('a',$a);
        $this->set('nest',$nest);
        $this->set('trds', $trds);
        //die;
    }
    

    protected function getTree($parentId=NULL) {
        
       
             
//        for ($i = 0; $i <= 10; $i++) {          
//        }
        
        $thread = $this->Trd->children($parentId, TRUE);

        foreach ($thread as $k => $v) {
            
            
                
                $chilDr = $this->getTree($v['Trd']['id']);
                
                  if($chilDr != array()){                 
                    $thread[$k]['chiLDR'] = $chilDr;
                  }
                   
               

            
        }

        $this->countRec++;
        return $thread;

    }

    /**
     * add new trd
     * 
     * @return void
     */
    public function add($id = null) {
        if($id == null){
            $id = 1;
        }
        $this->Trd->id = $id;
        if (!$this->Trd->exists()) {
            throw new NotFoundException(__('Invalid Trd.'));
        }
        if ($this->request->is('post')) {
            // @todo check if it bug or not. Should be converted automatecly 
            $this->request->data['Trd']['parent_id'] = $this->request->data['Trd']['parentId'];
            $this->request->data['ItemType']['id'] = $this->request->data['Trd']['ItemType'];
            $this->Trd->create();
            if ($this->Trd->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The Trd has been saved'),'default',array('class'=>'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Trd could not be saved. Please, try again.'));
            }
        }
        $this->set('parentId',$id);
        $parentIds = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '---');
        //$parentIds = $this->Trd->find('list');
        $this->set(compact('parentIds'));
        
        $itemTypes = $this->Trd->ItemType->find('list');
        $this->set(compact('itemTypes'));
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Trd->id = $id;
		if (!$this->Trd->exists()) {
			throw new NotFoundException(__('Invalid Trd'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    $this->request->data['ItemType']['id'] = $this->request->data['Trd']['ItemType'];
			if ($this->Trd->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The Trd has been saved'),'default',array('class'=>'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Trd could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Trd->read(null, $id);
		}
                
                $itemTypes = $this->Trd->ItemType->find('list');
                $this->set(compact('itemTypes')); 
                
		$parentIds = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '---');
                
		$this->set(compact('parentIds'));
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
		$this->Trd->id = $id;
		if (!$this->Trd->exists()) {
			throw new NotFoundException(__('Invalid trd'));
		}
		if ($this->Trd->delete()) {
			$this->Session->setFlash(__('Trd deleted'),'default',array('class'=>'success message'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trd was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

?>
