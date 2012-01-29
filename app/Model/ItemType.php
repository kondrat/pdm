<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class ItemType extends AppModel {
     public $hasMany = array(
        'Tray' => array(
            'className'  => 'Tray',
            'conditions' => array(),
            'order'      => ''
        )
    );   
}
