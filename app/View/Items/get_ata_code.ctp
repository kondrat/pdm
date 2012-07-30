            <div id="item-upperAssyList" data-at=<?php echo $at;?>>
            <?php if($rootTray == "root"):?>
                <?php if($rootItemName != NULL):?>
                    <div class="message">We already have a root assy</div>
                 <div class="item-rootExists"><?php echo $rootItemName;?></div>
                 <?php else: ?>               
                    <div class="message">Create a root assy</div>
                    
                <?php endif ?>
                <?php echo $this->Form->input('RootItem', array('value'=>1,'type'=>'hidden'));?>
            <?php elseif($rootTray == 'notroot'): ?>

                <?php if (isset($subItemsVers) && $subItemsVers == array()): ?>
                    <div class="message"><?php echo 'You must create upper assembly first'; ?></div>
                <?php else: ?>
                    <?php
                        //if(isset($parentTray) && $parentTray == FALSE){
                            echo $this->Form->input('Item.SubItemsVer', array(
                                'label' => 'Upper assy',
                                'empty' => 'choose one',
                                //'disabled' => TRUE,
                                'div'=>false
                            ));
                    ?>
                <?php endif ?>
                
            <?php endif;?>  


            </div>

