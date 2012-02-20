<div class="ItemTypes view">
<h2><?php  echo __('ItemType');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ItemType['ItemType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ItemType name'); ?></dt>
		<dd>
			<?php echo h($ItemType['ItemType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ItemType['ItemType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ItemType['ItemType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit ItemType'), array('action' => 'edit', $ItemType['ItemType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete ItemType'), array('action' => 'delete', $ItemType['ItemType']['id']), null, __('Are you sure you want to delete # %s?', $ItemType['ItemType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List ItemTypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New ItemType'), array('action' => 'add')); ?> </li>
	</ul>
</div>
