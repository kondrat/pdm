<div class="Projects form">
    <?php echo $this->Form->create('Tray'); ?>
    <fieldset>
        <legend><?php echo __('Edit Tray'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array('label' => __('Tray name')));
        echo $this->Form->input('parentId',array('default' => $this->request->data['Tray']['parent_id']));
        ?>
        
        <div><?php echo __('Drw number');?></div>
        
        <?php
        echo $this->Form->input('ItemType');
        echo $this->Form->input('drw_letter');
        ?>
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
