<div class="ItemTypes form">
<?php echo $this->Form->create('ItemType');?>
	<fieldset>
		<legend><?php echo __('Edit Item Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
                echo $this->Form->input('suffix');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ItemType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ItemType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Item Types'), array('action' => 'index'));?></li>
	</ul>
</div>
