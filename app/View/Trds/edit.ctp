<div class="Projects form">
<?php echo $this->Form->create('Trd');?>
	<fieldset>
		<legend><?php echo __('Edit Trd'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parentId',array('default' => $this->request->data['Trd']['parent_id']));
                echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Trd.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Trd.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Trds'), array('action' => 'index'));?></li>
	</ul>
</div>
