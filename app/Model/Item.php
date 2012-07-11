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
    

//    public $virtualFields = array(
//        'full_drwname' => 'CONCAT(Item.letter, " ", Item.ata, " ", Item.resp, " ", Item.drwnbr)'
//    );
    
    public $hasAndBelongsToMany = array(
        'SubItem' => array(
            'className' => 'Item',
            'joinTable' => 'items_items',
            'foreignKey' => 'item_id',
            'associationForeignKey' => 'sub_item_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ),
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
