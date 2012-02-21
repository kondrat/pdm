<div class="trays form">
    <?php echo $this->Form->create('Tray'); ?>
    <fieldset>
        <legend><?php echo __('Edit Tray'); ?></legend>
        <div><?php echo __('Parent name: ').'<span style="color:black;font-size:larger;">'.$parentName['Tray']['name'].'</span>';?></div>        
        <?php echo $this->Form->input('id');?>
        <?php echo $this->Form->input('parentId', array('type'=>'hidden', 'default' => $this->request->data['Tray']['parent_id']));?>
        <?php //echo $this->Form->input('parentId',array('default' => $this->request->data['Tray']['parent_id']));?>
        <div><?php echo $this->element('Trays/ata_code',array('trayArray' => $trayArray, 'addEdit' => 'edit'));?></div>
        <?php echo $this->Form->input('name', array('label' => __('Tray name')));?>       
     

        <div><?php //echo __('Parent name: ').'<span style="color:black;font-size:larger;">'.$parentName['Tray']['name'].'</span>';?></div>
        
        
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tray.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tray.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List of Trays'), array('action' => 'index')); ?></li>
    </ul>
</div>
