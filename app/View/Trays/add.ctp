<div class="trays form">
    <?php echo $this->Form->create('Tray'); ?>
    <fieldset>
        <legend><?php echo __('Add Tray'); ?></legend>
        <?php
        echo $this->Form->input('parentId', array('default' => $parentId));
        ?>
        <?php
        echo $this->Form->input('name');
        ?>

        <div><?php echo $this->element('Trays/ata_code',array('trayArray' => $trayArray, 'addEdit' => 'add'));?></div>
        <?php 
        echo $this->Form->input('ItemType');
        ?>
        <?php 
        //echo $this->Form->input('ata_cache',array('type'=>'hidden','value'=>$trayArray['prjType'].$trayArray['ata'].$trayArray['subAta'].$trayArray['subAtaTwo']));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Trays'), array('action' => 'index')); ?></li>
    </ul>
</div>
