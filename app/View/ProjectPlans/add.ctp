<div class="Projects form">
<?php echo $this->Form->create('ProjectPlan');?>
	<fieldset>
		<legend><?php echo __('Add Project Plan'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
        <?php 
                echo $this->Form->input('location');
        ?>
        <?php 
                echo $this->Form->input('project_id');
        ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects Plans'), array('action' => 'index'));?></li>
	</ul>
</div>
