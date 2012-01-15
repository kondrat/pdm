<?php

App::uses('AppModel', 'Model');

/**
 * ProjectPlan Model
 *
 */
class ProjectPlan extends AppModel {

    public $name = 'ProjectPlan';
    public $belongsTo = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id'
        )
    );

}
