<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class Jobcard extends AppModel {
//    public $hasAndBelongsToMany = array(
//        'User' => array(
//            'className' => 'User',
//            'joinTable' => 'groups_users',
//            'foreignKey' => 'user_id',
//            'associationForeignKey' => 'group_id',
//            'unique' => true,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'finderQuery' => '',
//            'deleteQuery' => '',
//            'insertQuery' => ''
//        )
//    );

    public $belongsTo = array(
        'Machine' => array(
            'className' => 'Machine',
            'foreignKey' => 'machine_id'
        ),
        'Originator' => array(
            'className' => 'User',
            'foreignKey' => 'originator_id'
        ),
        'Worker' => array(
            'className' => 'User',
            'foreignKey' => 'worker_id'
        )        
    );
    
    

}
