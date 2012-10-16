<?php

App::uses('AppModel', 'Model');

/**
 * Item Model
 *
 * @property SubItem $SubItem
 */
class Item extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $actsAs = array('Containable');
    

    public $virtualFields = array(
        'full_drwname' => 'CONCAT(letter, " ", ata, " ", resp, " ", drwnbr)'
    );

 
    
    
    public $validate = array(
        'SubItemsVer' => array(
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => false,
                'message'  => 'Alphabets and numbers only'
            ),
//            'between' => array(
//                'rule'    => array('between', 5, 15),
//                'message' => 'Between 5 to 15 characters'
//            )
        ),
        'tray' => array(
            'rule'    => 'numeric',
            'message' => 'Wrong tray code'
        ),
        'name' => array(
//            'rule' => 'alphaNumeric',
//            'required' => true,
//            'message' => 'Name should not be empty'
        ),
        'drwnbr' => array(
            'rule'       => 'numeric',
            'message'    => 'Enter a valid number',
            'required' => true,
            'allowEmpty' => false
        )
        
    );
    
    
    
    
    
    public $hasAndBelongsToMany = array(

        'Project' => array(
            'classname' => 'Project',
            'joinTable' => 'items_projects',
            'foreignKey' => 'item_id',
            'associationForeignKey' => 'project_id',
            'unique' => true
        )
    );
    public $belongsTo = array(
        'Tray' => array(
            'className' => 'Tray',
            'foreignKey' => 'tray_id'
        ),
        'ItemType'=>array(
            'className' => 'ItemType',
            'foreignKey' => 'item_type_id'
        ),
        'Responscode'
    );
    public $hasMany = array(
        'ItemsProject',
        'Itemversion',
        'Itemissue'
    );

}
