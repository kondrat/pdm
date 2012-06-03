 <div class="items form">

    <?php echo $this->Form->create('Item'); ?>
    <fieldset>
        <legend><?php echo __('Add New item to ') . $trayName.' '.$projectName; ?></legend>
        <?php echo $this->Form->input('project', array(
            'value'=>$projectId,
            'type'=>'hidden'          
        )); ?>
        <div class="wrap">
            <div class="moretest">
                <?php echo $this->Form->input('tray', array(
                    "id" => "item-trayListAdd",
                    'class'=>'test',
                    'div'=>FALSE
                    )); ?>
            </div>
            <div class="moretest2">
                <?php echo $this->Form->input('ItemType',array(
                     'div'=>FALSE
                ));?>
            </div>
        </div>
        <div id="tem"></div>

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
     
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
    </ul>
</div>
