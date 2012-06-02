<?php

App::uses('AppModel', 'Model');

/**
 * Project Model
 *
 */
class Project extends AppModel {
    
    public $name = 'Project';
    
    public $actsAs = array('Containable');
    
    public $hasMany = array(
        'ProjectPlan' => array(
            'className' => 'ProjectPlan',
            'foreignKey' => 'project_id'
        ),

        'ItemsProject',
        'PletterProject'

    );

    public $belongsTo = array(
        'Tray' => array(
            'className' => 'Tray',
            'foreignKey' => 'tray_id'
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
            ),
        'Pletter' => array(
			'className' => 'Pletter',
			'joinTable' => 'pletter_projects',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'pletter_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
    ); 
    
    
    
}
?>