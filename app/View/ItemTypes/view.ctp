<div class="parts view">
<h2><?php  echo __('Part');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($part['Part']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partname'); ?></dt>
		<dd>
			<?php echo h($part['Part']['partname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($part['Part']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($part['Part']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Part'), array('action' => 'edit', $part['Part']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Part'), array('action' => 'delete', $part['Part']['id']), null, __('Are you sure you want to delete # %s?', $part['Part']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Part'), array('action' => 'add')); ?> </li>
	</ul>
</div>
