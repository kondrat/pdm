<?php

App::uses('AppController', 'Controller');
//App::import('Utility', 'Set');

/**
 * trays Controller
 *
 * @property tray $trays
 */
class TraysController extends AppController {

    public $name = 'Trays';
    public $countRec = 0;
    
    public $components = array(
        'Ata'
    );
    

    public function index() {
        $trays = $this->Tray->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

        //$thread  = $this->Tray->children(1,TRUE); 
        $nest = $this->Tray->find('all');

        //$nest = Set::nest($nest,array('root' => '1'));
        //debug($nest);
        //$a = $this->getTree(0);
        //debug($a);
        //$this->set('a',$a);
        $this->set('nest', $nest);
        $this->set('trays', $trays);
        //die;
    }

    /*
     * To finish this or cancel
     * @todo to finich or cancel
     */

    protected function getTree($parentId=NULL) {



//        for ($i = 0; $i <= 10; $i++) {          
//        }

        $thread = $this->Tray->children($parentId, TRUE);

        foreach ($thread as $k => $v) {



            $chilDr = $this->getTree($v['Tray']['id']);

            if ($chilDr != array()) {
                $thread[$k]['chiLDR'] = $chilDr;
            }
        }

        $this->countRec++;
        return $thread;
    }

    /**
     * add new tray
     * 
     * @return void
     */
    public function add($id = null) {
        if ($id == null) {
            $id = 1;
        }
        $this->Tray->id = $id;
        if (!$this->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray.'));
        }
        if ($this->request->is('post')) {
            // @todo check if it bug or not. Should be converted automatecly 
            $this->request->data['Tray']['parent_id'] = $this->request->data['Tray']['parentId'];
            $this->request->data['ItemType']['id'] = $this->request->data['Tray']['ItemType'];
            $this->Tray->create();
            if ($this->Tray->saveAssociated($this->request->data)) {
               //ata cache making 
               $newTrayParents =  $this->Tray->getPath($this->Tray->id);
               $newTrayAta = $this->Ata->getAta($newTrayParents);
               $newTrayAtaCache = $newTrayAta['ata'].$newTrayAta['subAta'].$newTrayAta['subAtaTwo'];
               $this->Tray->saveField('ata_cache',$newTrayAtaCache);
               
                $this->Session->setFlash(__('The tray has been saved'), 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
                
            } else {
                $this->Session->setFlash(__('The tray could not be saved. Please, try again.'), 'default', array('class' => 'error message'));
            }
        }
        $this->set('parentId', $id);
        $parentIds = $this->Tray->generateTreeList(null, null, null, '---');
        //$parentIds = $this->Tray->find('list');
        $this->set(compact('parentIds'));

        $itemTypes = $this->Tray->ItemType->find('list');
        $this->set(compact('itemTypes'));

        $parents = $this->Tray->getPath($id);
        $this->set('parents', $parents);

        //geting data by using component 'ATA'
        $trayArray = $this->Ata->getAta($parents);
        $this->set('trayArray',$trayArray);
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Tray->id = $id;
        if (!$this->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            //debug($this->request->data);
            
            $this->request->data['ItemType']['id'] = $this->request->data['Tray']['ItemType'];
            $this->request->data['Tray']['parent_id'] = $this->request->data['Tray']['parentId'];
            
            if ($this->Tray->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The tray has been saved'), 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tray could not be saved. Please, try again.'),'default', array('class' => 'error message'));
            }
        } else {
            $this->request->data = $this->Tray->read(null, $id);
        }

        $itemTypes = $this->Tray->ItemType->find('list');
        $this->set(compact('itemTypes'));

        $parentIds = $this->Tray->generateTreeList(null, null, null, '---');
        $this->set(compact('parentIds'));

        $parents = $this->Tray->getPath($this->request->data['Tray']['id']);
        $this->set('parents', $parents);

        //geting data by using component 'ATA'
        $trayArray = $this->Ata->getAta($parents);
        $this->set('trayArray',$trayArray);
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
        $this->Tray->id = $id;
        if (!$this->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray'));
        }
        if ($this->Tray->delete()) {
            $this->Session->setFlash(__('tray deleted'), 'default', array('class' => 'success message'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('tray was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

?>
