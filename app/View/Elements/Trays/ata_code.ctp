<div class="tray-noClass">
    <p style="margin: 0;padding: 0;"><?php echo __('ATA code:'); ?></p>
    <?php //debug($trayArray);?>
    <?php //debug($addEdit);?>
    <?php
    
    //@todo to del
    foreach ($trayArray as $k=>$v){
        if($v == NULL){
            $trayArray[$k] = 'X';
        }
    }
    
    $swithCase = $trayArray['position'];
    if($addEdit == 'add'){
        $swithCase = $swithCase +1;
    }
    
    switch ($swithCase) {
        
        case 5:
            echo '<span class="tray-prjCode">X</span>'.' <span class="tray-ataCode">'
                .$trayArray['ata'] . ' ' 
                .$trayArray['subAta'] .
                '</span> <span class="tray-ataCodeInput">'.
            $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAtaTwo'],
                'label' => false,
                'div' => false,
                'error'=>false
                    )
            )
            . '</span> <span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
        
        case 4:
            
            echo '<span class="tray-prjCode">X</span>'
                .' <span class="tray-ataCode">'
                . $trayArray['ata'] 
                .'</span> <span class="tray-ataCodeInput">' . 
            $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAta'],
                'label' => false,
                'div' => false,
                'error'=>false
                    )
            )
             .'</span>'
            .$trayArray['subAtaTwo'] 
            . '<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
           
         case 3:
            echo '<span class="tray-prjCode">X</span> <span class="tray-ataCodeInput">'.
             
             $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['ata'],
                'label' => false,
                'div' => false,
                'error'=>false
                    )
            )
            .'</span> <span class="tray-ataCode">'.
              $trayArray['subAta'] . ' '.            
              $trayArray['subAtaTwo']
              .'</span><span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;             
        
         case 2:       
              '<span class="tray-prjCode">X</span><span class="tray-ataCode">'.
              $trayArray['ata'] .
              $trayArray['subAta'] . ' '.            
              $trayArray['subAtaTwo'] 
            .'</span><span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;        
        
         case 1:
        
             echo 'not a ATA';
            break;        
        
        
        
        
        default :
             echo 
              '<span class="tray-prjCode">X</span>'.
              $trayArray['ata'] .
              $trayArray['subAta'] .            
              $trayArray['subAtaTwo'] 
            .'<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
    }
    
        
    ?>

    <span class="tray-ataCodeInput"><?php echo $this->Form->input('ItemType',array('div'=>false,'label'=>false));?></span>
</div>
<div class="tray-noClass"><?php echo $this->Form->error('ata_code');?></div>