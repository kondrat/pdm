<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class ItemType extends AppModel {
     public $hasMany = array(
        'Item' => array(
            'className'  => 'Item',
            'conditions' => array(),
            'order'      => ''
        ),
        'Itd' => array(
            'className'  => 'Trd',
            'conditions' => array(),
            'order'      => ''
        )
    );   
}
