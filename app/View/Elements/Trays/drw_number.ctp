<div class="tray-noClass">
    <p><?php echo __('ATA code:'); ?></p>
    <?php //debug($trayArray);?>
    <b><?php
    foreach ($trayArray as $k=>$v){
        if($v == NULL){
            $trayArray[$k] = 'X';
        }
    }
    
    switch ($trayArray['position']) {
        
        case 5:
            echo $trayArray['prjType'] . ' ' . $trayArray['ata'] . ' ' . $trayArray['subAta'] . ' <span class="tray-ataCodeInput">' .
            $this->Form->input('drw_letter', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAtaTwo'],
                'label' => false,
                'div' => false
                    )
            )
            . '</span> <span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
        case 4:
            
            echo $trayArray['prjType'] . ' ' . $trayArray['ata'] . ' <span class="tray-ataCodeInput">' . 
            $this->Form->input('drw_letter', array(
                'options' => array('0','1', '2', '3', '4', '5', '6', '7', '8', '9'),
                'default' => $trayArray['subAta'],
                'label' => false,
                'div' => false
                    )
            )
            .$trayArray['subAtaTwo'] . '</span> ' 
            . '<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;
        
        
         case 3:
            echo $trayArray['prjType'] . ' <span class="tray-ataCodeInput">' .
             
             $this->Form->input('drw_letter', array(
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
        
             echo ' <span class="tray-ataCodeInput">' .
             
             $this->Form->input('drw_letter', array(
                'options' => array('A'=>'A','B'=>'B','C'=>'C','R'=>'R'),
                'default' => $trayArray['prjType'],
                'label' => false,
                'div' => false
                    )
            )
            .'</span> '.
              $trayArray['ata'] .
              $trayArray['subAta'] . ' '.            
              $trayArray['subAtaTwo'] 
            .'<span style="color:gray;font-weight:normal"> - xxxxx - xxx</span>';
            break;        
        
        
        
        
        
        
        default :
            echo 'nu vot';
            break;
    }
    ?>

    </b>
</div>
