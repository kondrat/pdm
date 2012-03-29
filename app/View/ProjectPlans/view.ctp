<div class="Projects view">
<h2><?php  echo __('Project\'s plan');?></h2>
	<dl>

		<dt><?php echo __('Project plan name'); ?></dt>
		<dd>
			<?php echo h($ProjectPlans['ProjectPlan']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
                    <span style="font-style:italic;">
                        <span> <?php echo __('back to project');?></span>
			<?php echo $this->Html->link(h($ProjectPlans['Project']['name']),array('controller'=>'Projects','action'=>'view',$ProjectPlans['Project']['id'])); ?>
                    </span>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project plan'), array('action' => 'edit', $ProjectPlans['ProjectPlan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project plan'), array('action' => 'delete', $ProjectPlans['ProjectPlan']['id']), null, __('Are you sure you want to delete # %s?', $ProjectPlans['ProjectPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project plan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
