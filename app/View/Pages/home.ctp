<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Items'), array('controller' => 'items', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Rifle\'s Trays'), array('controller' => 'trays', 'action' => 'index',2)); ?></li>
        <li><?php echo $this->Html->link(__('Tooling\'s Trays'), array('controller' => 'trays', 'action' => 'index',9)); ?></li>
        <li><?php echo $this->Html->link(__('ItemTypes'), array('controller' => 'itemTypes', 'action' => 'index')); ?></li>
    </ul>
</div>
