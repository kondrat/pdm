<div class="parts index">
	<h2><?php echo __('Job Cards');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($jobcards as $jobcard): ?>
	<tr>
		
		<td><?php echo h($jobcard['Jobcard']['name']); ?>&nbsp;</td>
		<td><?php echo h($jobcard['Jobcard']['created']); ?>&nbsp;</td>
		<td><?php echo h($jobcard['Jobcard']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jobcard['Jobcard']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jobcard['Jobcard']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jobcard['Jobcard']['id']), null, __('Are you sure you want to delete # %s?', $jobcard['Jobcard']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Job card'), array('action' => 'add')); ?></li>
	</ul>
</div>
