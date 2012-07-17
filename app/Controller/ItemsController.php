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
        //set current project for logged in User:
        if(isset($this->request->params['named']['prj']) && $this->request->params['named']['prj'] != $this->Session->read('Auth.User.User')){
            $this->Session->write('Auth.User.User.curprj',$this->request->params['named']['prj']);
            $this->loadModel('User');
            $this->request->data['User']['id'] = 1;
            $this->request->data['User']['last_prj_id'] = $this->request->params['named']['prj'];
            $this->User->save($this->request->data);
        }
        
        
        $projects = $this->Item->Project->find('all',array(
            'fields' => array('Project.id', 'Project.name','Project.tray_id'),
            'contain'=>FALSE
            )               
        );
        
        
        $lastUserPrjId = null;
        if($this->Session->read('Auth.User.User.curprj')){
            $lastUserPrjId = $this->Session->read('Auth.User.User.curprj');
        }
        
        $userCurPrj = array();
        $prjTray = array();
        $allPrj = array();
        foreach ($projects as $k=>$v){
            if($v['Project']['id'] == $lastUserPrjId){
                $userCurPrj = $v;
                
            }else{
                $allPrj[] = $v;
            }
        }
        $userCurPrj['Project']['tray_name'] = null;

        if($userCurPrj != array()){
            $prjTray = $this->Item->Tray->find('first',array(
                'conditions'=>array('Tray.id'=>$userCurPrj['Project']['tray_id']),
                'contain'=>false
            ));
            $userCurPrj['Project']['tray_name'] = $prjTray['Tray']['name'];
        }
        
        
        $this->set('userPrj',$userCurPrj);
        $this->set('allPrj',$allPrj);
        





        $items = $this->Item->find('all',array(
            'conditions' => array(),
            'contain' => array(
                'Project' => array('conditions' => array('Project.id' => 1, 'Project.id !=' => NULL)),
                'SubItem',
                'Tray'
            )
               
        ));
        
        $curPrjItems = array();
        
        foreach ($items as $k=>$v){
            foreach ($v['Project'] as $k2=>$v2){
                if($v2['id'] == $lastUserPrjId){
                    $curPrjItems[] = $v;
                    break;
                }
            }
        }

        $this->set('itemsCount',  count($curPrjItems));
        $this->set('items',$curPrjItems);







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
        /**
         * checking params named
         */
        $prjId = $this->params['named']['prj'];
        $this->Item->Project->id = $prjId;

        if (!$this->Item->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }

        $trayId = $this->request->params['named']['trd'];
        $this->Item->Tray->id = $trayId;

        if (!$this->Item->Tray->exists()) {
            throw new NotFoundException(__('Invalid tray'));
        }

        /**
         * workign with the post datas
         */
        if ($this->request->is('post')) {
                

            

            $this->request->data["ItemType"]["id"] = $this->request->data['Item']['ItemType'];
            $this->request->data["Item"]["tray_id"] = $this->request->data['Item']['tray'];
            $this->request->data["Project"]["id"] = $this->request->data["Item"]["project"];
            $this->request->data['Item']['letter'] = $this->request->data['Item']['Pletter'];
            $this->request->data['Item']['responscode_id'] = $this->request->data['Item']['Responscode'];
            $resp = $this->Item->Responscode->find('first',array(
                'conditions'=>array('Responscode.id'=>$this->request->data['Item']['Responscode']),
                'contain'=>FALSE
            ));
            
            $this->request->data['Item']['resp'] = $resp['Responscode']['name'];
            $this->request->data['Item']['item_type_id'] = $this->request->data['Item']['ItemType'];
            //$this->request->data["Item"]["drwnbr"] = $this->request->data['drwnbr'];
            //$this->request->data["Item"]["name"] = $this->request->data['name'];

            $this->request->data["Itemversion"]["version"] = "200"; //$this->request->data['name'];
//            debug($this->request->data);

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

        /**
         * setting needed data for view
         */
        /**
         * setting params named for project
         */
        $project = $this->Item->Project->find('first', array(
            'conditions' => array('Project.id' => $this->params['named']['prj']),
            'fields' => array('Project.id', 'Project.name'),
            'contain' => false
                ));
        $this->set('projectName', $project['Project']['name']);
        $this->set('projectId', $this->params['named']['prj']);

        /**
         * setting params named for tray
         */
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

        /**
         * setting params named for ItemVersions (upper assy for item to be added
         */
        $subItems = $this->Item->Itemversion->find('all', array(
                //'conditions'=>array('Itemversion.id'=>111)
                ));
        $subItemsVers = array();
        foreach ($subItems as $k => $v) {
            $subItemsVers[$k] = $v['Item']['drwnbr'] . ' - ' . $v['Itemversion']['version'] . ' (' . $v['Item']['name'] . ')';
        }

        $this->set('subItemsVers', $subItemsVers);

        /**
         * setting params named for project letter
         */
        $pl = $this->Item->Project->Pletter->find('all', array(
            'contain' => array("Project" => array('conditions' => array('Project.id' => $prjId)))
                ));

        $pletters = array();
        //debug($pl);
        foreach ($pl as $k => $v) {
            if ($v["Project"] != array()) {
                $pletters[$v['Pletter']['name']] = $v["Pletter"]["name"];
            }
        }
        $this->set('pletters', ($pletters));

        /**
         * setting params responablity code
         */
        $responscodes = $this->Item->Responscode->find('list');
        //debug($Responscode);
        $this->set('responscodes', $responscodes);


        /**
         * setting params named for ata code
         */
        $ataData = array();
        $ataId = null;

        $ataId = $this->request->params['named']['trd'];

        if ($ataId != null) {

            $ataData = $this->Item->Tray->find('first', array(
                'conditions' => array('Tray.id' => $ataId)
                    ));

            //debug($ataData);
        } else {
            return;
        }

        $this->set('ataCache', $ataData['Tray']['ata_cache']);
        $this->set('itemType', $ataData['ItemType']['suffix']);

        /**
         * setting params named item suffix
         */
        $itemTypes = $this->Item->ItemType->find('list');
        $this->set('itemTypes', $itemTypes);
        $itemSuffixes = $this->Item->ItemType->find('list', array('fields' => array('ItemType.id', 'ItemType.suffix')));
        $itemSuffixes = json_encode($itemSuffixes);
        $this->set('itemSuffixes', $itemSuffixes);
    }

    /**
     * providing ata code to drw number creating
     */
    public function getAtaCode() {

        if ($this->request->is('ajax')) {

//            Configure::write('debug', 0);
//            $this->autoLayout = false;
//            $this->autoRender = FALSE;

            $ataData = array();
            $ataId = null;

            $ataId = $this->request->data["ataId"];
            $prjId = $this->request->data["prjId"];

            //getting needed project and cheking it
            
            $this->Item->Project->id = $prjId;
            if (!$this->Item->Project->exists()) {
                //add invalid project
                return;
            }

            //checking needed tray id

            $this->Item->Tray->id = $ataId;
            if (!$this->Item->Tray->exists()) {
                //add invalid tray
                return;
            } else {
                
                $ataData = $this->Item->Tray->find('first',array(
                    'conditions'=>array('Tray.id'=>$ataId),
                    'contain'=>FALSE
                ));
                                
            }
            
            $at['ataCache'] = $ataData['Tray']['ata_cache'];
            

        
            //checking parent tray info

            $parentTray = $this->Item->Tray->getParentNode($ataId);

            //debug($parentTray);
  
            //debug($parentTray['Tray']['id']);
            if($parentTray['Tray']['id'] == 1) {
                $rootTray = 'root';
            } else {
                $rootTray = 'notroot';
            }
            
            $this->set('rootTray',$rootTray);
  

            $itemsRes = array();
            
            if($rootTray == 'notroot'){

                $items = $this->Item->find('all', array(

                    'conditions'=>array(
                        'Item.tray_id'=>array($ataId, $parentTray['Tray']['id']),
                        'Item.item_type_id'=>1
                        ),
                    'contain' => array(
                        'Project' => array('conditions' => array('Project.id' => $prjId)),
                        'Itemversion'
                    )
                ));
                //debug($items);

                //get items only for needed project

                
                foreach ($items as $k => $v) {
                    if ($v['Project'] != array()) {

                        foreach ($v['Itemversion'] as $k1=>$v1){
                            $itemsRes[$v1['id']] = $v['Item']['drwnbr'].' - '.$v1['version']. ' (' . $v['Item']['name'] . ')';
                        }

                    }
                }
            } 

            $this->set('subItemsVers', $itemsRes);
            
            if($itemsRes != array() || $rootTray == 'root'){
                $at['form'] = 1;
            }
            
            
            $nbr = $this->giveDrwNbr('ata');
            $at['nbr'] = $nbr;
            
            
            $at = json_encode($at);
            
            $this->set('at', $at);
            
            
            
            
        }
    }

    /**
     * providing the sugesstion for the number
     */
    private function giveDrwNbr($ata=null) {
        
        
            $items = $this->Item->find('first',array(
              'conditions'=>array(
                   'Item.letter'=> '',// $this->request->data["Item"]["Pletter"],
                   'Item.ata' => $ata,
//                   'Item.resp'=>'bla-bla'
               ),
               'order'=>('Item.drwnbr DESC'),
               'contain' => false
            ));

            if($items == array()){
                $suggested = 0000;
            }
            $suggested = $items['Item']['drwnbr'] + 10;
            //debug($suggested);
            $suggested = sprintf("%04d", $suggested);
            
            $sugLength = strlen($suggested);
            if($sugLength > 4){
                $suggested = '';
            }
            
            return $suggested;
        
        
        
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
