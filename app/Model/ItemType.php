<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class ItemType extends AppModel {
     public $hasMany = array(
        'ItemType' => array(
            'className'  => 'ItemType',
            'conditions' => array(),
            'order'      => ''
        )
    );   
}
