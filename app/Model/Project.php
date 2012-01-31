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
}
