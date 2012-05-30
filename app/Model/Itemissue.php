<?php
App::uses('AppModel', 'Model');
/**
 * Itemissue Model
 *
 * @property Item $Item
 */
class Itemissue extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'item_id';

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
}
