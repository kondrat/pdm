<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Items'), array('controller' => 'items', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Trays'), array('controller' => 'trays', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('ItemTypes'), array('controller' => 'itemTypes', 'action' => 'index')); ?></li>
    </ul>
</div>
