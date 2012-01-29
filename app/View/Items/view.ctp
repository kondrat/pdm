<div class="items view">
<h2><?php  echo __('Item');?></h2>
	<dl>
		<dt><?php echo __('tray name'); ?></dt>
		<dd>
			<?php echo h($item['Tray']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drawing number'); ?></dt>
		<dd>
			<?php echo h($item['Item']['drwnbr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item type'); ?></dt>
		<dd>
			<?php echo h($item['ItemType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Items'), array('controller' => 'sub_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Item'), array('controller' => 'sub_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sub Items');?></h3>
	<?php if (!empty($item['SubItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($item['SubItem'] as $subItem): ?>
		<tr>
			<td><?php echo $subItem['id'];?></td>
			<td><?php echo $subItem['name'];?></td>
			<td><?php echo $subItem['created'];?></td>
			<td><?php echo $subItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sub_items', 'action' => 'view', $subItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sub_items', 'action' => 'edit', $subItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sub_items', 'action' => 'delete', $subItem['id']), null, __('Are you sure you want to delete # %s?', $subItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sub Item'), array('controller' => 'sub_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
