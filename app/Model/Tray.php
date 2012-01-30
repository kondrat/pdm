<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 */
class Tray extends AppModel {
    public $name = 'Tray';
    public $actsAs = array('Tree');
    
    public $validate = array(
        //'name' => 'alphaNumeric',
        //'drw_letter' => 'alphaNumeric'
    );
    
    
    public $hasMany = array(

    );
    public $belongsTo = array(
        'ItemType' => array(
            'className' => 'ItemType',
            'foreignKey' => 'item_type_id'
        )
    );
}
