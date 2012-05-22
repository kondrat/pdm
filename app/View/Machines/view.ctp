<div class="parts view">
<h2><?php  echo __('Machine');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Machine name'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($machine['Machine']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Machine'), array('action' => 'edit', $machine['Machine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Machine'), array('action' => 'delete', $machine['Machine']['id']), null, __('Are you sure you want to delete # %s?', $machine['Machine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Machine'), array('action' => 'add')); ?> </li>
	</ul>
</div>
