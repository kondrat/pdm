<div class="Projects form">
<?php echo $this->Form->create('ProjectPlan');?>
	<fieldset>
		<legend><?php echo __('Edit Project Plan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
                echo $this->Form->input('location');
                echo $this->Form->input('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectPlan.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProjectPlan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Plans'), array('action' => 'index'));?></li>
	</ul>
</div>
