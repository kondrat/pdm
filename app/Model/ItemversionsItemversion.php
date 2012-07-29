<?php
App::uses('AppModel', 'Model');
/**
 * Itemissue Model
 *
 * @property Item $Item
 */
class ItemversionsItemversion extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'itemver_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Itemversion' => array(
			'className' => 'Itemversion',
			'foreignKey' => 'itemversion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
