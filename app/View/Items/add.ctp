<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('type',array('options'=>array('assy','part')));
		echo $this->Form->input('SubItem');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sub Items'), array('controller' => 'sub_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Item'), array('controller' => 'sub_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
