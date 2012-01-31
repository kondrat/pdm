<div class="tray-noClass">
    <p><?php echo __('ATA code:'); ?></p>
    <?php //debug($trayArray);?>
    <?php //debug($addEdit);?>
    <b><?php
    
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
            echo '<span class="tray-prjCode">X</span>' . ' ' . $trayArray['ata'] . ' ' . $trayArray['subAta'] . ' <span class="tray-ataCodeInput">' .
            $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAtaTwo'],
                'label' => false,
                'div' => false
                    )
            )
            . '</span> <span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
        
        case 4:
            
            echo '<span class="tray-prjCode">X</span>' . ' ' . $trayArray['ata'] . ' <span class="tray-ataCodeInput">' . 
            $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAta'],
                'label' => false,
                'div' => false
                    )
            )
             .'</span>'
            .$trayArray['subAtaTwo'] 
            . '<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
           
         case 3:
            echo '<span class="tray-prjCode">X</span>' . ' <span class="tray-ataCodeInput">' .
             
             $this->Form->input('ata_code', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['ata'],
                'label' => false,
                'div' => false
                    )
            )
            .'</span> '.
              $trayArray['subAta'] . ' '.            
              $trayArray['subAtaTwo']
              .'<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;             
        
         case 2:       
              '<span class="tray-prjCode">X</span>' .
              $trayArray['ata'] .
              $trayArray['subAta'] . ' '.            
              $trayArray['subAtaTwo'] 
            .'<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
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

    </b>
</div>
