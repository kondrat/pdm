<div class="ItemTypes form">
<?php echo $this->Form->create('ItemType');?>
	<fieldset>
		<legend><?php echo __('Add ItemType'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('suffix');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List ItemTypes'), array('action' => 'index'));?></li>
	</ul>
</div>
