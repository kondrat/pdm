<div class="items form">

    <?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <legend><?php echo __('Add New item to ') . $trayName . ' ' . $projectName; ?></legend>
        <?php
        echo $this->Form->input('project', array(
            'value' => $projectId,
            'type' => 'hidden'
        ));
        ?>
        <div class="wrap">
            <div class="moretest">
                <?php
                echo $this->Form->input('tray', array(
                    "id" => "item-trayListAdd",
                    'class' => 'test',
                    'div' => FALSE,
                    'empty'=>'choose one'
                ));
                ?>
            </div>

        </div>
        <div id="tem_to_change" style="display: none;">

            <?php if (isset($subItemsVers) && $subItemsVers == array()): ?>
                <div><?php echo 'You must create upper assembly first'; ?></div>
            <?php else: ?>
                <?php
                    if(isset($parentTray) && $parentTray == FALSE){
                        echo $this->Form->input('SubItemsVer', array(
                            'label' => 'Upper assy',
                            'empty' => 'choose one',
                            'disabled' => TRUE
                        ));
                    } else {
                        echo '<div>'.__('Create a root Assy').'</div>';
                    }
                
                ?>
            <?php endif ?>


            <div class="item-newItemNbr  item-newItemNbrDis">
                <span id="item-pLetterTip" title="Project Letter" class="item-pletter">
                <?php echo $this->Form->input('Pletter', array('label' => false, 'div' => false, 'disabled' => TRUE)); ?>
                </span> -
                <span id="item-ataCodeTip" title="Ata code"><?php echo $ataCache; ?></span> -
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
                echo $this->Form->input('ata', array('type' => 'hidden', 'value' => $ataCache));

                ?>- <span id="item-suffixTip" title="Suffix" data-itemsuffixs=<?php echo $itemSuffixes; ?>><?php echo $itemType; ?></span> - <span id="item-issueTip" title="Issue: new drawing under development">A01</span>
                <span id="item-drwNbrCounter" class="item-drwNumberCounter">5</span>
            </div>
            <div class="moretest2">
                <?php
                echo $this->Form->input('ItemType', array(
                    'div' => FALSE,
                    'label' => FALSE,
                    'id' => 'item-ItemType',
                    'disabled' => TRUE
                ));
                ?>
            </div>

            <?php echo $this->Form->input('name', array(
                "class" => "item-addNewItemName",
                'disabled'=>TRUE
                )); ?>        

 




            <?php echo $this->Form->end(__('Submit')); ?>

    </fieldset>
      

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
    </ul>
</div>
