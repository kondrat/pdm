<?php

App::uses('AppController', 'Controller');

/**
 * Trds Controller
 *
 * @property Trd $Trds
 */
class TrdsController extends AppController {

    public $name = 'Trds';

    public $countRec = 0;


    public function index() {
        $data = $this->Trd->generateTreeList(null, "{n}.Trd.id", null, '...');
        //$thread  = $this->Trd->children(1,TRUE); 
        //$data = $this->Trd->find('threaded');
        //debug($thread);
        debug($data);
        $a = $this->getTree(1);
        debug($a);
        $this->set('a',$a);
        $this->set('trds', $data);
        
        //die;
    }
    

    protected function getTree($parentId=NULL) {

//        for ($i = 0; $i <= 10; $i++) {          
//        }
        
        $thread = $this->Trd->children($parentId, TRUE);

        foreach ($thread as $k => $v) {
            
            
                
                $chilDr = $this->getTree($v['Trd']['id']);
                
                if ($chilDr != array()) {                    
                    $thread[$k]['chiLDR'] = $chilDr;                  
                }
                
            
            
        }


        return $thread;
    }

    /**
     * add new trd
     * 
     * @return void
     */
    public function add() {
        
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
