<div style="float: left;width: 100%;margin-left: 20px;">
   <h3><?php echo __('Menu'); ?></h3> 
</div>
<div class="actions">
    
    <ul>
        <li>Items and Types</li>
        <li><?php echo $this->Html->link(__('Rifle Items'), array('controller' => 'items', 'action' => 'index','prj'=>$this->Session->read('Auth.User.User.curprj'))); ?></li>
        <li><?php echo $this->Html->link(__('ItemTypes'), array('controller' => 'itemTypes', 'action' => 'index')); ?></li>
        <li>Trays</li>        
        <li><?php echo $this->Html->link(__('Rifle\'s Trays'), array('controller' => 'trays', 'action' => 'index',2)); ?></li>
        <li><?php echo $this->Html->link(__('Tooling\'s Trays'), array('controller' => 'trays', 'action' => 'index',9)); ?></li>
        <li>Job cards</li>
        <li><?php echo $this->Html->link(__('Job Cards'), array('controller' => 'jobcards', 'action' => 'index')); ?></li>
        <li>Projects</li>
        <li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Projects Letter'), array('controller' => 'pletters', 'action' => 'index')); ?></li>
     
    </ul>
</div>
<div class="actions">
    <ul>
        <li>Users and Groups</li>
        <li><?php echo $this->Html->link(__('Groups'), array('controller' => 'groups', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
        <li>Machines</li>
        <li><?php echo $this->Html->link(__('Machines'), array('controller' => 'machines', 'action' => 'index')); ?></li>
        <li>Materials</li>
        <li><?php echo $this->Html->link(__('Materials'), array('controller' => 'materials', 'action' => 'index')); ?></li>
    </ul>
</div>