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
}
