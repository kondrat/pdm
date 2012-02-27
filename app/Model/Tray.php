<?php

App::uses('AppModel', 'Model');

/**
 * Project Model
 *
 */
class Tray extends AppModel {

    public $name = 'Tray';
    public $actsAs = array('Tree','Containable');
    public $validate = array(
        'name' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Ata name is incorrect'
        ),
        'ata_code' => array(
            'ruleAlphNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => false,
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
            'className' => 'Items',
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

    public function checkAtaUnique($check) {
        
        $value = array_values($check);
        //debug($value[0]);
        //debug($this->data);
        $childs = $this->children($this->data['Tray']['parent_id']);
        $thisTrayAta = NULL;
        $thisTray = array();
        if (isset($this->data['Tray']['id'])) {
            //$thisTray = $this->read('ata_code', $this->data['Tray']['id']);
            $thisTray = $this->find('first',array(
                'conditions'=>array('Tray.id' => $this->data['Tray']['id']),
                'fields'=>array('ata_code')
                    
                    ));
            //debug($thisTray);
            
            $thisTrayAta = $thisTray['Tray']['ata_code'];
            //debug($thisTrayAta);
            //debug($this->data['Tray']['ata_code']);
        }

        foreach ($childs as $v) {
            //debug($this->data['Tray']['ata_code']);
            if ($v['Tray']['ata_code'] == $this->data['Tray']['ata_code'] ) {
                
                if($thisTrayAta != NULL && $v['Tray']['ata_code'] == $thisTrayAta){
                    //echo $thisTrayAta;
                    return TRUE;
                }
                
                return FALSE;
            }
        }
        //debug($child);
        return TRUE;
    }

}
