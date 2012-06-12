            <?php if (isset($subItemsVers) && $subItemsVers == array()): ?>
                <div><?php echo 'You must create upper assembly first'; ?></div>
            <?php else: ?>
                <?php
                    //if(isset($parentTray) && $parentTray == FALSE){
                        echo $this->Form->input('SubItemsVer', array(
                            'label' => 'Upper assy',
                            'empty' => 'choose one',
                            //'disabled' => TRUE,
                            'div'=>false
                        ));
                    //} else {
                        //echo '<div>'.__('Create a root Assy').'</div>';
                    //}
                
                ?>
            <?php endif ?>


                <?php debug($rootTray);
