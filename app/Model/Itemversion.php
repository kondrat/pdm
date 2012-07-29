<?php

App::uses('AppModel', 'Model');

/**
 * Itemversion Model
 *
 * @property Item $Item
 */
class Itemversion extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    //public $displayField = 'item_id';

    public $actsAs = array('Containable');
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Item' => array(
            'className' => 'Item',
            'foreignKey' => 'item_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * has many belongs to many
     * 
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'UpItemversion' => array(
            'className' => 'Itemversion',
            'joinTable' => 'itemversions_itemversions',
            'foreignKey' => 'itemversion_id',
            'associationForeignKey' => 'upitemversion_id',
            'unique' => true,
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

    /**
     * has many
     */
    public $hasMany = array(
        'IvIv' => array(
            'className' => 'ItemversionsItemversion',
            'joinTable' => 'itemversions_itemversions',
            'foreignKey' => 'itemversion_id'
        )
    );
    
}
