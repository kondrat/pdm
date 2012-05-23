<div class="materials view">
<h2><?php  echo __('Material');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($material['Material']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($material['Material']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($material['Material']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($material['Material']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Material'), array('action' => 'edit', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Material'), array('action' => 'delete', $material['Material']['id']), null, __('Are you sure you want to delete # %s?', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcards'), array('controller' => 'jobcards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcard'), array('controller' => 'jobcards', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Jobcards');?></h3>
	<?php if (!empty($material['Jobcard'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Originator Id'); ?></th>
		<th><?php echo __('Worker Id'); ?></th>
		<th><?php echo __('Material Id'); ?></th>
		<th><?php echo __('Machine Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Targetdate'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($material['Jobcard'] as $jobcard): ?>
		<tr>
			<td><?php echo $jobcard['id'];?></td>
			<td><?php echo $jobcard['name'];?></td>
			<td><?php echo $jobcard['status'];?></td>
			<td><?php echo $jobcard['originator_id'];?></td>
			<td><?php echo $jobcard['worker_id'];?></td>
			<td><?php echo $jobcard['material_id'];?></td>
			<td><?php echo $jobcard['machine_id'];?></td>
			<td><?php echo $jobcard['quantity'];?></td>
			<td><?php echo $jobcard['description'];?></td>
			<td><?php echo $jobcard['targetdate'];?></td>
			<td><?php echo $jobcard['created'];?></td>
			<td><?php echo $jobcard['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jobcards', 'action' => 'view', $jobcard['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'jobcards', 'action' => 'edit', $jobcard['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'jobcards', 'action' => 'delete', $jobcard['id']), null, __('Are you sure you want to delete # %s?', $jobcard['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Jobcard'), array('controller' => 'jobcards', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
