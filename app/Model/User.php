<?php
App::uses('AppModel', 'Model');
/**
 * Part Model
 *
 */
class User extends AppModel {
    
    public $name = 'User';
    
    public function beforeSave() {
        if (isset($this->data[$this->alias]['password'])) {
            //$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
//        'email' => array(
//            'rule'    => array('email', true),
//            'message' => 'Please supply a valid email address.'
//        )
    );
    
    public $hasAndBelongsToMany = array(
        'Group' => array(
            'className' => 'Group',
            'joinTable' => 'groups_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'group_id',
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
