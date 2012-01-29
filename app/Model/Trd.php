<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 */
class Trd extends AppModel {
    public $name = 'Trd';
    public $actsAs = array('Tree');
    public $hasMany = array(

    );
    public $belongsTo = array(
        'ItemType' => array(
            'className' => 'ItemType',
            'foreignKey' => 'item_type_id'
        )
    );
}
