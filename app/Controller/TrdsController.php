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
        $data = $this->Trd->generateTreeList(null,"{n}.Trd.id", null, '...');
        debug($data); 
        $this->set('trds',$data);
        //die;
    }


}
?>
