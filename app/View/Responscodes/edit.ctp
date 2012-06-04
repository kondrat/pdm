<div class="responscodes form">
<?php echo $this->Form->create('Responscode');?>
	<fieldset>
		<legend><?php echo __('Edit Responscode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Responscode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Responscode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Responscodes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
