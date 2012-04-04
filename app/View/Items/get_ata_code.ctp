<div class="item-newItemNbr">
<span id="item-ataCodeTip" title="Ata code"><?php echo $ataCache;?></span> -<?php echo $this->Form->input('drwnbr',
        array(  'div'=>false,
                'label'=>false,
                'class'=>"item-addNewItemNbr",
                "id"=>"item-drwNbrTip",
                "title"=>"Drawing Number, 5 digits"));?>-
<span id="item-suffixTip" title="Suffix"><?php echo $itemType;?></span> - <span id="item-issueTip" title="Issue: new drawing under development">A01</span>
<span id="item-drwNbrCounter" class="item-drwNumberCounter">5</span>
</div>

<?php echo $this->Form->input('name',array("class"=>"item-addNewItemName"));?>
<?php echo $this->Form->input('SubItem');?>