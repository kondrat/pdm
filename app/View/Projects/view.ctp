<div class="Projects view">
<h2><?php  echo __('Project');?></h2>
	<dl>

		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<span style="color:blue;font-weight: bold;font-size: larger">
                            <?php echo h($Project['Project']['name']); ?>
                        </span>
			&nbsp;
		</dd>
		<dt><?php echo __('Project plan'); ?></dt>
		<dd>
			<?php 
                            if(isset ($Project['ProjectPlans'][0]['name'])){
                                echo $this->Html->link(h($Project['ProjectPlans'][0]['name']),array('controller'=>'ProjectPlans','action'=>'view',$Project['ProjectPlans'][0]['id']));
                            } else {
                                echo $this->Html->link(__('Create new project plan'),array('controller'=>'ProjectPlans','action'=>'add'));
                            }
                        ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($Project['Project']['created']); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $Project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $Project['Project']['id']), null, __('Are you sure you want to delete # %s?', $Project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
	</ul>
</div>
