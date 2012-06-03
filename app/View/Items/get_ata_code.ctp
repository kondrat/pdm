
<?php if(isset($subItemsVers) && $subItemsVers == array() ):?>
    <div><?php echo 'You must create upper assembly first';?></div>
<?php else: ?>
    <?php  echo $this->Form->input('SubItemsVer',array('label'=>'Upper assy','empty'=>'choose one'));?>
<?php endif ?>


<div class="item-newItemNbr">
    <span id="item-pLetterTip" title="Project Letter" class="item-pletter">
        <?php echo $this->Form->input('Pletter',array('label'=>false,'div'=>false)) ;?>
    </span> -
    <span id="item-ataCodeTip" title="Ata code"><?php echo $ataCache; ?></span> -<?php
        echo $this->Form->input('drwnbr', array('div' => false,
            'label' => false,
            'class' => "item-addNewItemNbr",
            "id" => "item-drwNbrTip",
            "title" => "Drawing Number, 5 digits"));
        echo $this->Form->input('ata',array('type'=>'hidden','value'=>$ataCache));
        ?>-
    <span id="item-suffixTip" title="Suffix"><?php echo $itemType; ?></span> - <span id="item-issueTip" title="Issue: new drawing under development">A01</span>
    <span id="item-drwNbrCounter" class="item-drwNumberCounter">5</span>
</div>

<?php echo $this->Form->input('name', array("class" => "item-addNewItemName")); ?>
