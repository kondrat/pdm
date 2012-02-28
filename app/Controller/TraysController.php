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

    public function index($id=NULL) {

        $this->Tray->id = $id;
        if (!$this->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray'));
        }
        
        $traysData = array();
        $riflesTrays = array();
        $trayName = NULL;
        
        $traysData = $this->Tray->find('first',array(
            'conditions'=>array('Tray.id'=>$id),
            'fields'=>array('Tray.lft','Tray.rght','Tray.name'),
            'contain'=>false)
                );
        if ($traysData != array()) {
            $trayName = $traysData['Tray']['name'];
            $riflesTrays = $this->Tray->generateTreeList(
                            array('Tray.lft >=' => $traysData['Tray']['lft'], 'Tray.rght <=' => $traysData['Tray']['rght']), null, null, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
        }

        $nest = $this->Tray->find('all');
        //creating nested array from flat array. To be used for JS funny tree
//        $nest1 = Set::nest($nest, array('root' => '1'));
//        $this->set('nest1', $nest1);
        
        //same done my function toDel
//        $a = $this->getTree(0);
//        $this->set('a',$a);
        
        $this->set('nest', $nest);
        $this->set('trayName',$trayName);
        $this->set('trays', $riflesTrays);

    }

    /*
     * To finish this or cancel
     * @todo to finich or cancel
     */

    protected function getTree($parentId=NULL) {


        $thread = $this->Tray->children($parentId, TRUE);

        foreach ($thread as $k => $v) {



            $chilDr = $this->getTree($v['Tray']['id']);

            if ($chilDr != array()) {
                $thread[$k]['chiLDR'] = $chilDr;
            }
        }
        //@todo toDel
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
            $this->request->data['Tray']['item_type_id'] = $this->request->data['Tray']['ItemType'];
            unset($this->request->data['Tray']['parentId']);
            unset($this->request->data['Tray']['ItemType']);


            $this->Tray->create();
            if ($this->Tray->save($this->request->data)) {
                //ata cache making 
                $newTrayParents = $this->Tray->getPath($this->Tray->id);
                $newTrayAta = $this->Ata->getAta($newTrayParents);
                $newTrayAtaCache = $newTrayAta['ata'] . $newTrayAta['subAta'] . $newTrayAta['subAtaTwo'];
                $this->Tray->saveField('ata_cache', $newTrayAtaCache);

                $this->Session->setFlash(__('The tray has been saved'), 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tray could not be saved. Please, try again.'), 'default', array('class' => 'error message'));
            }
        }
        $this->set('parentId', $id);
        //$parentIds = $this->Tray->generateTreeList(null, null, null, '---');
        //$parentIds = $this->Tray->find('list');
        //$this->set(compact('parentIds'));
        $parentName = $this->Tray->find('first', array(
                    'conditions' => array('Tray.id' => $id),
                    'fields' => array('Tray.name'),
                ));
        $this->set('parentName', $parentName);

        $itemTypes = $this->Tray->ItemType->find('list', array('fields' => array('ItemType.id', 'ItemType.name')));
        $itemSuffixes = $this->Tray->ItemType->find('list', array('fields' => array('ItemType.id', 'ItemType.suffix')));
        $itemSuffixes = json_encode($itemSuffixes);
        $this->set('itemSuffixes', $itemSuffixes);
        $this->set(compact('itemTypes'));

        $parents = $this->Tray->getPath($id);
        //$this->set('parents', $parents);
        //geting data by using component 'ATA'
        $trayArray = $this->Ata->getAta($parents);
        $this->set('trayArray', $trayArray);
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


            $this->request->data['Tray']['parent_id'] = $this->request->data['Tray']['parentId'];
            unset($this->request->data['Tray']['parentId']);
            unset($this->request->data['Tray']['ItemType']);

            //debug($this->request->data);

            if ($this->Tray->save($this->request->data)) {

                //ata cache making 
                $newTrayParents = $this->Tray->getPath($this->Tray->id);
                $newTrayAta = $this->Ata->getAta($newTrayParents);
                $newTrayAtaCache = $newTrayAta['ata'] . $newTrayAta['subAta'] . $newTrayAta['subAtaTwo'];
                $this->Tray->saveField('ata_cache', $newTrayAtaCache);

                $this->Session->setFlash(__('The tray has been saved'), 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tray could not be saved. Please, try again.'), 'default', array('class' => 'error message'));
            }
        } else {
            $this->request->data = $this->Tray->read(null, $id);
        }

        //$itemTypes = $this->Tray->ItemType->find('list');
        //$this->set(compact('itemTypes'));

        $parentIds = $this->Tray->generateTreeList(null, null, null, '---');
        $this->set(compact('parentIds'));

        $itemTypes = $this->Tray->ItemType->find('list', array('fields' => array('ItemType.id', 'ItemType.name')));
        $itemSuffixes = $this->Tray->ItemType->find('list', array('fields' => array('ItemType.id', 'ItemType.suffix')));
        $itemSuffixes = json_encode($itemSuffixes);
        $this->set('itemSuffixes', $itemSuffixes);
        $this->set(compact('itemTypes'));



        $parentName = $this->Tray->find('first', array(
                    'conditions' => array('Tray.id' => $this->request->data['Tray']['parent_id']),
                    'fields' => array('Tray.name'),
                ));
        $this->set('parentName', $parentName);

        $parents = $this->Tray->getPath($this->request->data['Tray']['id']);
        $this->set('parents', $parents);

        //geting data by using component 'ATA'
        $trayArray = $this->Ata->getAta($parents);
        $this->set('trayArray', $trayArray);
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
