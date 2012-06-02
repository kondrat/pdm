<?php

App::uses('AppController', 'Controller');

/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {
    /*
     * before filter
     */

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow(array('getItemsForPrj','getAtaCode'));
        $this->Auth->allow();

        if ($this->request->is('ajax')) {
            //$this->Security->validatePost = false;
            //$this->Security->csrfCheck = false;
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Item->recursive = 0;
        $projects = $this->Item->Project->find('list', array('fields' => array('Project.id', 'Project.name')));
        $this->set('projects', $projects);



        $traysData = array();
        $riflesTrays = array();

        $traysData = $this->Item->Tray->find('first', array(
            'conditions' => array('Tray.id' => 2),
            'fields' => array('Tray.lft', 'Tray.rght', 'Tray.name'),
            'contain' => false)
        );
        if ($traysData != array()) {
            $trayName = $traysData['Tray']['name'];
            $riflesTrays = $this->Item->Tray->generateTreeList(
                    array('Tray.lft >=' => $traysData['Tray']['lft'], 'Tray.rght <=' => $traysData['Tray']['rght']), null, null, '....');
        }

        $this->set('riflesTrays', $riflesTrays);
        $this->set('trayName', $trayName);
        $this->set('items', $this->paginate());






        $ii = $this->Item->find('all', array(
            'conditions' => array(),
            'contain' => array(
                'Project' => array('conditions' => array('Project.id' => 2, 'Project.id !=' => NULL)),
                'SubItem',
                'Tray'
            )
                )
        );

        //$ii = Set::extract('/Project[id=1]',$ii);

        $this->set('ii', $ii);

        $gg = $this->Item->ItemsProject->find('all', array(
            'conditions' => array('ItemsProject.project_id' => 1),
            'contain' => array(
                //'Item'
                'Item' => array('SubItem')
            )
                )
        );
        $this->set('gg', $gg);
    }

    private $projectItmes = array();


    /**
     * Geting items in tree view
     */

    public function todel() {


        $neededProject = NULL;
        //to get from url later
        $neededProject = 1;
        
        //getting only items which belongs for choosen prj.
        
        $itemsForCurPrj = $this->Item->find('all', array(
            //'conditions'=>array('Item.id'=>21),
            'fields' => array('Item.id', 'Item.tray_id', 'Item.name', 'Item.drwnbr'),
            'contain' => array(
                'SubItem' => array('fields' => array('SubItem.id', 'SubItem.tray_id', 'SubItem.name', 'SubItem.drwnbr')),
                'Project' => array('conditions' => array('Project.id' => $neededProject), 'fields' => array('Project.id'))
            )
                ));

        
        //removing parts not from current project, consturcting new array with IDs on subItems.

        $newArray = array();

        foreach ($itemsForCurPrj as $k => $v) {
            if ($v['Project'] != array()) {
                $tempArr = array();
                $tempArr['Item'] = $v['Item'];
                $tempArr['SubItem'] = array();
                
                foreach ($v['SubItem'] as $vp) {
                    $tempArr['SubItem'][] = $vp['id'];
                }
                $newArray[] = $tempArr;
            }
        }

        //$this->set('testToSeeItems', $newArray);

        $this->projectItmes = $newArray;

        //make tree of items

        $rootItem = NULL;
        //to get in later from DB.
        $rootItemId = 23;
        $rootItemPos = NULL;

        //getting key of first tree Item for final Tree
        foreach ($newArray as $kk => $vv) {
            if ($vv['Item']['id'] == $rootItemId) {
                $rootItemPos = $kk;
                break;
            }
        }


        $newK = array(0 => array('Item' => $newArray[$rootItemPos]['Item'], 'SubItem' => $newArray[$rootItemPos]['SubItem']));

        $itmesInTree[0] = $this->makeTree($newK[0]);
        $this->set('itmesInTree', $itmesInTree);
    }

    private function makeTree($getChild = array()) {

        $toWork = $getChild['SubItem'];
        unset($getChild['SubItem']);
        $res = $getChild;

        foreach ($toWork as $k => $v) {

            foreach ($this->projectItmes as $k2 => $v2) {

                if ($v == $v2['Item']['id']) {

                    $res['Child'][$k] = $this->makeTree($v2);

                    break;
                }
            }
        }

        return $res;
    }

    
 
    
    
    public function getItemsForPrj() {
        if ($this->request->is('ajax')) {

            $prjId = null;

            $prjId = $this->request->data["prjId"];

            if ($prjId != null) {

                $itemOfPrj = $this->Item->find('all', array(
                        //'conditions'=>array('Project.project_id'=>$prjId)
                        ));

                //debug($itemOfPrj);
            } else {
                return;
            }

            //$this->set('ataCache',$ataData['Tray']['ata_cache']);
            //$this->set('itemType',$ataData['ItemType']['suffix']);
        }
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if (!isset ($this->params['named']['prj']) && $this->params['named']['prj'] == null) {
            throw new NotFoundException(__('Invalid project'));
        }
        
        $trayId = $this->request->params['named']['trd'];


        $this->Item->Tray->id = $trayId;
        if (!$this->Item->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray'));
        }

        if ($this->request->is('post')) {


            //$this->request->data["ItemType"]["id"] = $this->request->data['Item']['ItemType'];
            $this->request->data["Item"]["tray_id"] = $this->request->data['Item']['tray'];
            $this->request->data["Project"]["id"] = $this->request->data["Item"]["projects"];
            $this->request->data["Item"]["drwnbr"] = $this->request->data['drwnbr'];
            $this->request->data["Item"]["name"] = $this->request->data['name'];

            $this->request->data["Itemversion"]["version"] = "200";//$this->request->data['name'];
            //debug($this->request->data);

            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                
                $this->request->data["Itemversion"]["item_id"] = $this->Item->id;
                $this->Item->Itemversion->save($this->request->data);
                
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        }


//        $projects = $this->Item->Project->find('list', array(
//            'condition' => array(),
//            'fields' => array('Project.id', 'Project.name'),
//            'contain' => false
//                ));
        $this->set('projectId',$this->params['named']['prj']);


        $traysData = array();
        $riflesTrays = array();

        $traysData = $this->Item->Tray->find('first', array(
            'conditions' => array('Tray.id' => $trayId),
            'fields' => array('Tray.lft', 'Tray.rght', 'Tray.name'),
            'contain' => false)
        );

        if ($traysData != array()) {
            $trayName = $traysData['Tray']['name'];
            $trays = $this->Item->Tray->generateTreeList(
                    array('Tray.lft >=' => $traysData['Tray']['lft'], 'Tray.rght <=' => $traysData['Tray']['rght']), null, null, '----');
        }
        $this->set(compact('trays'));
        $this->set('trayName', $trayName);

        $itemTypes = $this->Item->ItemType->find('list');
        $this->set('itemTypes',$itemTypes);
        

        $itemVersions = $this->Item->Itemversion->find('all');
        $this->set('itemversions',$itemVersions);
        
    }

    /**
     * 
     */
    public function getAtaCode() {
        if ($this->request->is('ajax')) {

            $ataData = array();
            $ataId = null;

            $ataId = $this->request->data["ataId"];

            if ($ataId != null) {

                $ataData = $this->Item->Tray->find('first', array(
                    'conditions' => array('Tray.id' => $ataId)
                        ));

                //debug($ataData);
            } else {
                return;
            }

            //getting project letter
            $prjId = 1;//$this->request->data["prjId"];
            
//            $pl = $this->Item->Project->PletterProject->find('all',
//                    array(
//                        'conditions'=>array('PletterProject.Project_id' => $prjId)
//                    ));
            
            $pl = $this->Item->Project->Pletter->find('all',
                    array(
                        //'conditions'=>array('PletterProject.Project_id' => $prjId)
                        'contain'=>array("Project"=>array('conditions'=>array('Project.id'=>$prjId)))
                    ));
            
            $pletters = array();
            //debug($pl);
            foreach ($pl as $k => $v){
                if($v["Project"] != array()){
                    $pletters[$v['Pletter']['id']] = $v["Pletter"]["name"];
                }
            }
            $this->set('pletters',($pletters));
            
            
            
            $this->set('ataCache', $ataData['Tray']['ata_cache']);
            $this->set('itemType', $ataData['ItemType']['suffix']);

            $subItems = $this->Item->Itemversion->find('all');
            $subItemsVers = array();
            foreach ($subItems as $k => $v){
                $subItemsVers[$k] = $v['Item']['drwnbr'].' - '.$v['Itemversion']['version'].' ('.$v['Item']['name'].')';
            }
            
            $this->set('subItemsVers',$subItemsVers);
            

        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data["ItemType"]["id"] = $this->request->data['Item']['ItemType'];
            $this->request->data["tray"]["id"] = $this->request->data['Item']['Tray'];

            if ($this->Item->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'), "default", array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Item->read(null, $id);
        }

        $trays = $this->Item->Tray->generateTreeList(null, null, null, '---');
        $this->set(compact('trays'));

        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
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
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->Item->delete()) {
            $this->Session->setFlash(__('Item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Item->recursive = 0;
        $this->set('items', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->set('item', $this->Item->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        }
        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash(__('The item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Item->read(null, $id);
        }
        $subItems = $this->Item->SubItem->find('list');
        $this->set(compact('subItems'));
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
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->Item->delete()) {
            $this->Session->setFlash(__('Item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
