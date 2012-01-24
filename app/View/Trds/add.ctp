<div class="Trds form">
<?php echo $this->Form->create('Trd');?>
	<fieldset>
		<legend><?php echo __('Add Trd'); ?></legend>
	<?php
		echo $this->Form->input('parentId',array('default'=>$parentId));
	?>
        <?php 
                echo $this->Form->input('name');
        ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trds'), array('action' => 'index'));?></li>
	</ul>
</div>
