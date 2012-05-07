<div class="Jobcards view">
<h2><?php  echo __('Job card');?></h2>


<table class="jcard-mainTable">
    <tr class="jcard-manufPart">
        <td><?php echo __('ID Number:');?>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></span></td>
        <td><?php echo __('TASK Number:');?>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></span></td>
    </tr>
    <tr class="jcard-manufPart">
        <td><?php echo __('Originator:');?>&nbsp;<span><?php echo "Originator Name" ?></span></td>
        <td><?php echo __('Start date:');?>&nbsp;<span><?php echo h($jobcard['Jobcard']['created']); ?></span></td>
    </tr>
    <tr class="jcard-manufPart">
        <td><?php echo __('Assigned to:');?>&nbsp;<span><?php echo "Worker name"; ?></span></td>
        <td><?php echo __('Target date:');?>&nbsp;<span><?php echo "Date"; ?></span></td>
    </tr>
    <tr class="jcard-manufPart">
        <td><?php echo __('Assigned to:');?>&nbsp;<span><?php echo "Worker name"; ?></span></td>
        <td><?php echo __('Target date:');?>&nbsp;<span><?php echo "Date"; ?></span></td>
    </tr>
</table>




</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jobcard'), array('action' => 'edit', $jobcard['Jobcard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jobcard'), array('action' => 'delete', $jobcard['Jobcard']['id']), null, __('Are you sure you want to delete # %s?', $jobcard['Jobcard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobcards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jobcard'), array('action' => 'add')); ?> </li>
	</ul>
</div>
