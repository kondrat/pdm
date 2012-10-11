<div class="items form">
    
    <div style="border:1px solid red;margin-bottom: 20px; float: left;"><-- To del --></div>

    <?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <legend><?php echo __('Add New Root item to project: '). $projectName; ?></legend>
        <?php
        echo $this->Form->input('project', array(
            'value' => $projectId,
            'type' => 'hidden'
        ));
        ?>
        <div class="wrap">

                <?php
                echo $this->Form->input('tray', array(
                    'type' => 'hidden',
                    'div' => FALSE,
                    'empty'=>'choose one'
                ));
                ?>


        </div>
        <?php $disFormClass = "";?>
   
        <div id="tem_to_change" class="<?php echo $disFormClass;?>">


                    <?php                  
                            echo $this->Form->input('Item.SubItemsVer', array(
                                'type'=> 'hidden',
                                'disabled' => TRUE,
                                'div'=>false
                            ));
                    ?>                                


            <div class="item-newItemNbr  item-newItemNbrDis">
                <span id="item-pLetterTip" title="Project Letter" class="item-pletter">
                <?php echo $this->Form->input('Pletter', array('label' => false, 'div' => false, 'disabled' => TRUE)); ?>
                </span> -
                <span id="item-ataCodeTip" title="Ata code">
                <?php echo $ataCache;?>
                </span><?php echo $this->Form->input('ata', array('type'=>'hidden', 'value' => $ataCache,'id'=>'item-ataCode'));?> -
                <span id="item-resCodeTip" class="item-respCode" title="Responsability code">
                <?php
                        echo $this->Form->input('Responscode',array(
                            'div'=>FALSE,
                            'label'=>false,
                            'disabled' => TRUE
                        ));
                ?></span>    
                
                <?php
                echo $this->Form->input('drwnbr', array(
                    'div' => false,
                    'label' => false,
                    'class' => "item-addNewItemNbr",
                    "id" => "item-drwNbrTip",
                    "title" => "Drawing Number, 5 digits",
                    'disabled' => TRUE
                ));
                

                ?>- <span id="item-suffixTip" title="Suffix"><?php echo '000';?></span> - <span id="item-issueTip" title="Issue: new drawing under development">A01</span>
                <span id="item-drwNbrCounter" class="item-drwNumberCounter">5</span>
            </div>


            <?php echo $this->Form->input('name', array(
                "class" => "item-addNewItemName",
                'disabled'=>TRUE
                )); ?>        

 




            <?php 
            $options = array(
                'label' => __('Submit'),
                'disabled' => "disabled",
                'div'=>array('class'=>'item-submitDis')
                );
            echo $this->Form->end( $options); 
            ?>
   
        </div>
    </fieldset>


</div>
 
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Items project ').$projectName, array('action' => 'index')); ?></li>
    </ul>
</div>