<?php
App::uses('AppModel', 'Model');
/**
 * Responscode Model
 *
 * @property Item $Item
 */
class Responscode extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'responscode';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'responscode_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
