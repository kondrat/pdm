<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 */
class Tray extends AppModel {
    public $name = 'Tray';
    public $actsAs = array('Tree');
    
    public $validate = array(
        'name' => array(
            'rule'=> 'alphaNumeric',
            'required'=>true,
            'message'=>'Just a test for node name'
        ),
        'ata_code' => array(
            'ruleAlphNumeric' => array(
                    'rule'=>'alphaNumeric',
                    'required' => true,
                    'message' => 'Just a test for ata_code'
            ),
            'ruleCheckAta' => array(
                    'rule' => array('checkAta',26),
                    'message' => 'Ata code already taken'
            )
        )
    );
    
    
    public $hasMany = array(

    );
    public $belongsTo = array(
        'ItemType' => array(
            'className' => 'ItemType',
            'foreignKey' => 'item_type_id'
        ),
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id'
        )
    );
    
    
    public function checkAta($check){
        $value = array_values($check);
        debug($value[0]);
        debug($this->data);
//        debug($ata_code);
//        debug($data);
//        debug($parent_id);
        return FALSE;
    }
    
}
