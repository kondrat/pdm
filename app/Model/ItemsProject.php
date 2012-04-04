<?php

App::uses('AppModel', 'Model');

/**
 * Item Model
 *
 * @property SubItem $SubItem
 */
class ItemsProject extends AppModel {
    
    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Item','Project'
    );

}
