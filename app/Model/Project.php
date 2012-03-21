<?php

App::uses('AppModel', 'Model');

/**
 * Project Model
 *
 */
class Project extends AppModel {

    public $name = 'Project';
    public $hasMany = array(
        'ProjectPlan' => array(
            'className' => 'ProjectPlan',
            'foreignKey' => 'project_id'
        ),
        'Tray' => array(
            'className' => 'Tray',
            'foreignKey' => 'project_id'
        )
    );

    public $hasAndBelongsToMany = array(
        'Item' =>
            array(
                'className'              => 'Item',
                'joinTable'              => 'items_projects',
                'foreignKey'             => 'project_id',
                'associationForeignKey'  => 'item_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );    
    
}
?>