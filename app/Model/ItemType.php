<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class ItemType extends AppModel {
     public $actsAs = array('Containable');
     public $hasMany = array(
        'Tray' => array(
            'className'  => 'Tray',
            'conditions' => array(),
            'order'      => ''
        )
    );   
}
