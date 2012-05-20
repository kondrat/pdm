<div class="Jobcards form">
<?php echo $this->Form->create('Jobcard');?>
	<fieldset>
		<legend><?php echo __('Add Jobcard'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('originator');
                echo $this->Form->input('Assigned to');
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Jobcards'), array('action' => 'index'));?></li>
	</ul>
</div>
