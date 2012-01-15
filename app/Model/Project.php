<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 */
class Project extends AppModel {
    public $name = 'Project';
    public $hasMany = array(
        'ProjectPlans' => array(
            'className' => 'ProjectPlan',
            'foreignKey' => 'project_id'
        ));    
}
