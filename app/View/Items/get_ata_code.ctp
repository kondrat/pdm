            <div id="item-upperAssyList" data-at=<?php echo $at;?>>
            <?php if($rootTray == "root"):?>
                
                <div class="message">Create a root assy</div>
                
            <?php elseif($rootTray == 'notroot'): ?>

                <?php if (isset($subItemsVers) && $subItemsVers == array()): ?>
                    <div class="message"><?php echo 'You must create upper assembly first'; ?></div>
                <?php else: ?>
                    <?php
                        //if(isset($parentTray) && $parentTray == FALSE){
                            echo $this->Form->input('SubItemsVer', array(
                                'label' => 'Upper assy',
                                'empty' => 'choose one',
                                //'disabled' => TRUE,
                                'div'=>false
                            ));
                    ?>
                <?php endif ?>
                
            <?php endif;?>  


            </div>

