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
		)
	);

}
