<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class Machine extends AppModel {
    
    public $hasMany = array(
        'Jobcards'
    );  
    
}
