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
            'allowEmpty' => false,
            'message'=>'Ata name is incorrect'
        ),
        'ata_code' => array(
            'ruleAlphNumeric' => array(
                    'rule'=>'alphaNumeric',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => 'Ata code must be Numeric'
            ),
            'ruleCheckAta' => array(
                    'rule' => array('checkAtaUnique'),
                    'message' => 'Ata code already taken'
            )
        )
    );
    
    
    public $hasMany = array(
        'MyItems' => array(
            'className'  => 'Items',
        )
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
    
    
    public function checkAtaUnique($check){
        $value = array_values($check);
        //debug($value[0]);
        //debug($this->data);
        $child = $this->children($this->data['Tray']['parent_id']);
        foreach ($child as $v){
            if( $v['Tray']['ata_code'] == $this->data['Tray']['ata_code'] ){
                //echo 'puk';
                return FALSE;
            }
        }
        //debug($child);
        return TRUE;
    }
    
}
