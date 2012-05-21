<div class="parts form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('password');
                echo $this->Form->input('email');
                echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>Nothing</li>
	</ul>
</div>
